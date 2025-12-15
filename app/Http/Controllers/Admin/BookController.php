<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['seller.user', 'category', 'media']);

        // Filter by category
        if ($request->filled('category')) {
            if ($request->category === 'uncategorized') {
                $query->whereNull('category_id');
            } else {
                $query->where('category_id', $request->category);
            }
        }

        // Search
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%');
            });
        }

        $books = $query->paginate(10)->withQueryString();
        $categories = Category::allWithUncategorized();

        return view('admin.books.index', compact('books', 'categories'));
    }

    public function updateCategory(Request $request, Book $book)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $book->update(['category_id' => $validated['category_id']]);

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Book category updated successfully!');
    }
}