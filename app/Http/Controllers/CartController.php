<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
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

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function removeFromCart($bookId)
    {
        $cart = session()->get('cart');

        if (isset($cart[$bookId])) {
            unset($cart[$bookId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
