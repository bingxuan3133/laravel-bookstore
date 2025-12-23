<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $bookIds = array_keys($cart);
        $books = Book::with('seller', 'media')->findMany($bookIds)->keyBy('id');

        // Calculate totals
        $subtotal = 0;
        foreach ($cart as $bookId => $item) {
            if (isset($books[$bookId])) {
                $subtotal += $books[$bookId]->price * $item['quantity'];
            }
        }

        $tax = $subtotal * 0.10;
        $total = $subtotal + $tax;

        return view('checkout.index', compact('cart', 'books', 'subtotal', 'tax', 'total'));
    }

    private function validateCart($cart)
    {
        $validatedItems = [];
        $errors = [];
        $subtotal = 0;

        foreach ($cart as $bookId => $item)
        {
            $book = Book::with('seller')->find($bookId);

            if (!$book) {
                $errors[] = "Book ID {$bookId} not found";
                continue;
            }

            // Check if book is active
            if (!$book->is_active) {
                $errors[] = "{$book->title} is no longer available";
                continue;
            }

            // Check stock availability
            if ($book->stock < $item['quantity']) {
                $errors[] = "{$book->title} - Only {$book->stock} left in stock (you requested {$item['quantity']})";
                continue;
            }

            // Use current price from database (prevent price manipulation)
            $currentPrice = $book->price;
            $itemTotal = $currentPrice * $item['quantity'];
            $subtotal += $itemTotal;

            $validatedItems[] = [
                'book' => $book,
                'quantity' => $item['quantity'],
                'price' => $currentPrice,
                'total' => $itemTotal,
            ];
        }

        return [
            'items' => $validatedItems,
            'subtotal' => $subtotal,
            'errors' => $errors,
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'shipping_address' => 'required|string|max:500',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        // Validate cart one more time before creating order
        $validatedCart = $this->validateCart($cart);

        if (isset($validatedCart['errors']) && !empty($validatedCart['errors'])) {
            return redirect()->route('cart.index')->with('error', 'Some items in your cart are no longer available. Please review your cart.');
        }

        DB::beginTransaction();

        try {
            // Create order
            $order = Order::create([
                'user_id' => Auth::id() ?? null,
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'shipping_address' => $request->shipping_address,
                'status' => 'pending',
                'subtotal' => $validatedCart['subtotal'],
                'tax' => $validatedCart['subtotal'] * 0.10,
                'total' => $validatedCart['subtotal'] * 1.10,
            ]);

            // Create order items and update stock
            foreach ($validatedCart['items'] as $item) {
                $order->items()->create([
                    'book_id' => $item['book']->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['total'],
                ]);

                // Decrease stock
                $item['book']->decrement('stock', $item['quantity']);
            }

            DB::commit();

            // Clear cart
            session()->forget('cart');

            return redirect()->route('checkout.success', $order->id)->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();

            // In testing/development, you might want to rethrow
            if (app()->environment(['local', 'testing'])) {
                throw $e;
            }

            return redirect()->route('checkout.index')->with('error', 'Failed to place order. Please try again.');
        }
    }

    public function success($orderId)
    {
        $order = Order::find($orderId);

        return view('checkout.success', compact('order'));
    }
}
