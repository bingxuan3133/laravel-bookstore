<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $seller = Auth::user()->seller;
        $status = $request->query('status', 'pending'); // Default to pending tab

        // Build base query
        $query = Order::whereHas('items.book', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })
        ->with(['items' => function ($query) use ($seller) {
            // Only load items that belong to this seller's books
            $query->whereHas('book', function ($q) use ($seller) {
                $q->where('seller_id', $seller->id);
            })->with('book');
        }, 'user']);

        // Filter by status and apply appropriate sorting
        if ($status === 'pending') {
            $query->where('status', 'pending')->oldest(); // Sort by oldest
        } elseif ($status === 'processing') {
            $query->where('status', 'processing')->oldest(); // Sort by oldest
        } elseif ($status === 'completed') {
            $query->where('status', 'completed')->latest(); // Sort by latest
        }

        $orders = $query->paginate(15)->appends(['status' => $status]);

        // Calculate stats
        $stats = [
            'total' => Order::whereHas('items.book', function ($query) use ($seller) {
                $query->where('seller_id', $seller->id);
            })->count(),
            'pending' => Order::whereHas('items.book', function ($query) use ($seller) {
                $query->where('seller_id', $seller->id);
            })->where('status', 'pending')->count(),
            'processing' => Order::whereHas('items.book', function ($query) use ($seller) {
                $query->where('seller_id', $seller->id);
            })->where('status', 'processing')->count(),
            'completed' => Order::whereHas('items.book', function ($query) use ($seller) {
                $query->where('seller_id', $seller->id);
            })->where('status', 'completed')->count(),
            'revenue' => Order::whereHas('items.book', function ($query) use ($seller) {
                $query->where('seller_id', $seller->id);
            })->where('status', 'completed')->sum('total'),
        ];

        return view('seller.orders.index', compact('orders', 'stats', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $seller = Auth::user()->seller;

        // Find the order and verify it contains items from this seller
        $order = Order::whereHas('items.book', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })->findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,processing,completed'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return redirect()
            ->route('seller.orders.index')
            ->with('success', 'Order status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
