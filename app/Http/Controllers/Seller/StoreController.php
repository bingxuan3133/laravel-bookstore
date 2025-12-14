<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function settings()
    {
        $seller = Auth::user()->seller;

        return view('seller.store-settings', compact('seller'));
    }

    public function update(Request $request, string $id)
    {
        $seller = Auth::user()->seller;

        $seller->update([
            'store_name' => $request['store_name'],
            'about' => $request['store_description'],
        ]);

        return redirect('seller.store-settings')->with('success', 'Store updated successfully.');
    }
}
