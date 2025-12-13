<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::select('id', 'name', 'slug')->get();
        $query = Book::with(['category', 'seller']);

        // Filter by category slug if provided
        if ($categorySlug = $request->query('category')) {
            $query->whereHas('category', function($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $books = $query->paginate(9)->withQueryString();

        return view('books.index', compact('books', 'categories'));
    }

    // public function show($bookId)
    // {
    //     $book = Book::find($bookId);

    //     return view('book.show', compact('book'));
    // }
    
}
