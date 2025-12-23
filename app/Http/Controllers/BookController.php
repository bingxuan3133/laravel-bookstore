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
        $query = Book::with(['category', 'seller', 'media']);

        // Filter by category slug if provided
        if ($categorySlug = $request->query('category')) {
            $query->whereHas('category', function($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        // Filter by search query
        if ($search = $request->query('search')) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }

        // Apply sorting
        switch ($request->query('sort')) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'title':
                $query->orderBy('title', 'asc');
                break;
            default:
                $query->latest();
        }

        $books = $query->paginate(9)->withQueryString();

        return view('books.index', compact('books', 'categories'));
    }

    public function show(Book $book)
    {
        $book->load(['category', 'seller']);

        // Get related books from the same category
        $relatedBooks = Book::where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->where('is_active', true)
            // ->where('stock', '>', 0)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('books.show', compact('book', 'relatedBooks'));
    }
}
