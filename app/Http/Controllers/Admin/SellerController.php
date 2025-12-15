<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SellerStatus;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(Request $request)
    {
        $query = Seller::with('user');

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('seller_status', $request->status);
        }

        $sellers = $query->paginate(15);

        return view('admin.sellers.index', compact('sellers'));
    }

    public function approve(Seller $seller)
    {
        $seller->update(['seller_status' => SellerStatus::Approved]);

        return redirect()
            ->route('admin.sellers.index')
            ->with('success', 'Seller approved successfully!');
    }

    public function reject(Seller $seller)
    {
        $seller->update(['seller_status' => SellerStatus::Rejected]);

        return redirect()
            ->route('admin.sellers.index')
            ->with('success', 'Seller rejected successfully!');
    }
}
