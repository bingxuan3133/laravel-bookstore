<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
    public function index()
    {
        // Get the current seller (assuming auth user has a seller relationship)
        $seller = Auth::user()->seller;

        if (!$seller) {
            abort(403, 'You are not registered as a seller.');
        }

        $stats = [
            'listed_books' => Book::where('seller_id', $seller->id)->count(),
            'total_sales' => 234, // Placeholder - replace with actual orders count
            'revenue' => 5842, // Placeholder - replace with actual revenue calculation
            'pending_orders' => 12, // Placeholder - replace with actual pending orders
        ];

        $recent_orders = []; // Placeholder - fetch actual orders when Order model is ready

        return view('seller.dashboard', compact('stats', 'recent_orders'));
    }
}
