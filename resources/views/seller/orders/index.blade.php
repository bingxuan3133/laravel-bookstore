@extends('layouts.seller')

@section('title', 'Orders')
@section('page-title', 'Orders')
@section('page-description', 'Manage your book orders')

@section('content')
<!-- Success Message -->
@if(session('success'))
<div class="bg-green-100 border-3 border-green-600 text-green-800 px-4 py-3 mb-6 shadow-brutal">
    <p class="font-bold">{{ session('success') }}</p>
</div>
@endif

@if(session('error'))
<div class="bg-red-100 border-3 border-red-600 text-red-800 px-4 py-3 mb-6 shadow-brutal">
    <p class="font-bold">{{ session('error') }}</p>
</div>
@endif

<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Total Orders</p>
                <p class="text-3xl font-black font-display">{{ $stats['total'] }}</p>
            </div>
            <div class="w-12 h-12 bg-sage border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Pending</p>
                <p class="text-3xl font-black font-display text-amber-600">{{ $stats['pending'] }}</p>
            </div>
            <div class="w-12 h-12 bg-amber-400 border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Completed</p>
                <p class="text-3xl font-black font-display text-green-600">{{ $stats['completed'] }}</p>
            </div>
            <div class="w-12 h-12 bg-green-400 border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Revenue</p>
                <p class="text-3xl font-black font-display">${{ number_format($stats['revenue'], 2) }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-400 border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Tabs Navigation -->
<div class="mb-8">
    <div class="border-b-3 border-neutral-900">
        <div class="flex gap-2">
            <a href="{{ route('seller.orders.index', ['status' => 'pending']) }}"
               class="px-6 py-3 font-bold uppercase text-sm tracking-wide transition-colors {{ $status === 'pending' ? 'bg-amber-400 border-3 border-neutral-900 border-b-0 text-neutral-900' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200' }}">
                Pending ({{ $stats['pending'] }})
            </a>
            <a href="{{ route('seller.orders.index', ['status' => 'processing']) }}"
               class="px-6 py-3 font-bold uppercase text-sm tracking-wide transition-colors {{ $status === 'processing' ? 'bg-purple-400 border-3 border-neutral-900 border-b-0 text-neutral-900' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200' }}">
                Processing ({{ $stats['processing'] }})
            </a>
            <a href="{{ route('seller.orders.index', ['status' => 'completed']) }}"
               class="px-6 py-3 font-bold uppercase text-sm tracking-wide transition-colors {{ $status === 'completed' ? 'bg-green-400 border-3 border-neutral-900 border-b-0 text-neutral-900' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200' }}">
                Completed ({{ $stats['completed'] }})
            </a>
        </div>
    </div>
</div>

@if($orders->count() > 0)
<!-- Orders List -->
<div class="space-y-6">
    @foreach($orders as $order)
    <div class="bg-white border-4 border-neutral-900 shadow-brutal">
        <!-- Order Header -->
        <div class="bg-sage border-b-4 border-neutral-900 px-6 py-4">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-xl font-black font-display mb-1">Order #{{ $order->order_number }}</h3>
                    <p class="text-sm text-neutral-600">
                        {{ $order->created_at->format('M d, Y \a\t h:i A') }}
                    </p>
                </div>
                <div class="text-right">
                    @php
                        $statusColors = [
                            'pending' => 'bg-amber-400 text-amber-900',
                            'processing' => 'bg-purple-400 text-purple-900',
                            'completed' => 'bg-green-400 text-green-900',
                        ];
                        $statusColor = $statusColors[$order->status] ?? 'bg-gray-400 text-gray-900';
                    @endphp
                    <span class="inline-block px-3 py-1 {{ $statusColor }} border-2 border-neutral-900 font-bold text-xs uppercase">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="px-6 py-4">
            <div class="mb-4">
                <p class="text-sm font-bold text-neutral-600 mb-2">CUSTOMER</p>
                <p class="font-bold">{{ $order->customer_name }}</p>
                <p class="text-sm text-neutral-600">{{ $order->customer_email }}</p>
                <p class="text-sm text-neutral-600 mt-1">{{ $order->shipping_address }}</p>
            </div>

            <p class="text-sm font-bold text-neutral-600 mb-3">YOUR ITEMS IN THIS ORDER</p>
            <div class="space-y-2 mb-4">
                @foreach($order->items as $item)
                <div class="flex justify-between items-center py-2 border-b border-neutral-200">
                    <div class="flex-1">
                        <p class="font-bold">{{ $item->book->title }}</p>
                        <p class="text-sm text-neutral-600">by {{ $item->book->author }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold">Qty: {{ $item->quantity }}</p>
                        <p class="text-sm text-neutral-600">${{ number_format($item->price, 2) }} each</p>
                    </div>
                    <div class="text-right ml-6">
                        <p class="font-bold">${{ number_format($item->total, 2) }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="space-y-2 pt-4 border-t-2 border-neutral-900">
                <div class="flex justify-between items-center text-neutral-700">
                    <span>Subtotal</span>
                    <span class="font-bold">${{ number_format($order->subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between items-center text-neutral-700">
                    <span>Tax (10%)</span>
                    <span class="font-bold">${{ number_format($order->tax, 2) }}</span>
                </div>
                <div class="flex justify-between items-center pt-2 border-t-2 border-neutral-900">
                    <p class="font-bold uppercase">Order Total</p>
                    <p class="text-xl font-black font-display">${{ number_format($order->total, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Order Actions -->
        @if($order->status === 'pending')
        <div class="bg-neutral-50 border-t-4 border-neutral-900 px-6 py-4">
            <p class="text-sm font-bold text-neutral-600 mb-3">UPDATE ORDER STATUS</p>
            <form action="{{ route('seller.orders.update', $order) }}" method="POST" class="inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="processing">
                <button type="submit" class="px-6 py-2 bg-blue-400 hover:bg-blue-500 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all font-bold">
                    Start Processing
                </button>
            </form>
        </div>
        @elseif($order->status === 'processing')
        <div class="bg-neutral-50 border-t-4 border-neutral-900 px-6 py-4">
            <p class="text-sm font-bold text-neutral-600 mb-3">UPDATE ORDER STATUS</p>
            <form action="{{ route('seller.orders.update', $order) }}" method="POST" class="inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="completed">
                <button type="submit" class="px-6 py-2 bg-green-400 hover:bg-green-500 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all font-bold">
                    Mark as Completed
                </button>
            </form>
        </div>
        @endif
    </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="mt-8">
    {{ $orders->links() }}
</div>
@else
<!-- Empty State -->
<div class="bg-white border-4 border-neutral-900 shadow-brutal p-12 text-center">
    <div class="max-w-md mx-auto">
        <div class="w-24 h-24 bg-neutral-100 border-3 border-neutral-900 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
        </div>
        <h3 class="text-2xl font-black font-display mb-3">No Orders Yet</h3>
        <p class="text-neutral-600 mb-6">Orders will appear here once customers start purchasing your books.</p>
    </div>
</div>
@endif
@endsection
