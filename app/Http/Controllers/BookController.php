<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::paginate();
        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    // public function show($bookId)
    // {
    //     $book = Book::find($bookId);

    //     return view('book.show', compact('book'));
    // }
    
}
