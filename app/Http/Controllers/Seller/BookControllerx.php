<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::select('id', 'name', 'slug')->get();
        $query = Book::with(['category', 'seller'])->where(['seller', Auth::user()->seller->id]);

        // Filter by category slug if provided
        if ($categorySlug = $request->query('category')) {
            $query->whereHas('category', function($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $books = $query->paginate(9)->withQueryString();

        return view('seller.books.index', compact('books', 'categories'));
    }

    public function create(Request $request)
    {
        Book::create([
            'seller_id' => Auth::user()->seller->id,
            'title' => $request['title'],
            'author' => $request['author'],
            'country' => $request['country'],
            'language' => $request['language'],
            'link' => $request['link'],
            'pages' => $request['pages'],
            'year' => $request['year'],
        ]);
    }
}
