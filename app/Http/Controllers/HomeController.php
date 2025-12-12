<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::take(6)->get();
        $featuredBooks = Book::take(8)->get();
        $newArrivals = Book::latest()->take(4)->get();

        return view('home', compact('categories', 'featuredBooks', 'newArrivals'));
    }
}
