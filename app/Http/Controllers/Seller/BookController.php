<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seller = Auth::user()->seller;

        $totalBooks = $seller->books()->count();
        $publishedBooks = $seller->books()->where('is_active', true)->count();
        $unpublishedBooks = $seller->books()->where('is_active', false)->count();

        $books = $seller->books()->with('media')->with('category')->paginate(9)->withQueryString();

        return view('seller.books', compact('books', 'totalBooks', 'publishedBooks', 'unpublishedBooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.books-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Book::create([
            'seller_id' => Auth::user()->seller->id,
            'title' => $request['title'],
            'author' => $request['author'],
            'country' => $request['country'],
            'language' => $request['language'],
            'link' => $request['link'],
            'pages' => $request['pages'],
            'year' => $request['year'],
            'is_active' => true,
        ]);

        if ($request->hasFile('image'))
        {
            $book->addMedia($request->file('image'))->toMediaCollection('book_covers');
        }

        return redirect()->route('seller.books.index')
            ->with('success', 'Book added successfully!');
    }

    public function publish(Book $book)
    {
        $book->update(['is_active' => true]);

        return redirect()->route('seller.books.index')->with('success', 'Book published successfully.');
    }

    public function unpublish(Book $book)
    {
        $book->update(['is_active' => false]);

        return redirect()->route('seller.books.index')->with('success', 'Book unpublished successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
