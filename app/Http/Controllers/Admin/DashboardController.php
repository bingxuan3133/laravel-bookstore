<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SellerStatus;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_books' => Book::count(),
            'active_sellers' => Seller::where('seller_status', SellerStatus::Approved)->count(),
            'total_users' => User::count(),
            'total_categories' => Category::count(),
        ];

        $recent_books = Book::with(['category', 'seller'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_books'));
    }
}
