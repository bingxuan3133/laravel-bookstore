<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $bookIds = array_keys($cart);
        $books = Book::with('seller', 'media')->findMany($bookIds);

        return view('cart.index', compact('cart', 'books'));
    }

    public function updateQuantity(Request $request, $bookId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0'
        ]);

        $book = Book::findOrFail($bookId);
        $cart = session()->get('cart', []);

        if (!isset($cart[$bookId])) {
            return redirect()->route('cart.index')->with('error', 'Item not found in cart');
        }

        // If quantity is 0, remove from cart
        if ($request->quantity <= 0) {
            unset($cart[$bookId]);
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Item removed from cart');
        }

        // Check stock availability
        if ($request->quantity > $book->stock) {
            return redirect()->route('cart.index')->with('error', 'Not enough stock available. Only ' . $book->stock . ' items left.');
        }

        // Update quantity
        $cart[$bookId]['quantity'] = $request->quantity;
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Quantity updated');
    }

    public function addToCart(Request $request)
    {
        $book = Book::findOrFail($request->book_id);

        $cart = session()->get('cart', []); // get current cart or empty array

        if (isset($cart[$book->id])) {
            // increase quantity if book already in cart
            $cart[$book->id]['quantity'] += $request->quantity ?? 1;
        } else {
            // add new book
            $cart[$book->id] = [
                'name' => $book->name,
                'price' => $book->price,
                'quantity' => $request->quantity ?? 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function removeFromCart($bookId)
    {
        $cart = session()->get('cart');

        if (isset($cart[$bookId])) {
            unset($cart[$bookId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart!');
    }
}
