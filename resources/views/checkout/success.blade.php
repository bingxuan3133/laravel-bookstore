@extends('layouts.users')

@section('title', 'Order Confirmation - Bookoo')

@section('content')
<div class="min-h-screen py-12 bg-neutral-50">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        <!-- Success Message -->
        <div class="bg-white border-3 border-neutral-900 shadow-brutal p-8 mb-8 text-center">
            <div class="w-20 h-20 bg-green-500 border-3 border-neutral-900 rounded-full mx-auto mb-6 flex items-center justify-center">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            <h1 class="text-4xl font-black font-display text-neutral-900 mb-3">Order Confirmed!</h1>
            <p class="text-lg text-neutral-600 mb-2">Thank you for your purchase</p>
            <p class="text-sm text-neutral-500">
                A confirmation email has been sent to <span class="font-bold text-neutral-700">{{ $order->customer_email }}</span>
            </p>
        </div>

        <!-- Order Details -->
        <div class="bg-white border-3 border-neutral-900 shadow-brutal p-8 mb-8">
            <div class="flex items-center justify-between mb-6 pb-6 border-b-2 border-neutral-900">
                <div>
                    <h2 class="text-2xl font-black font-display text-neutral-900 uppercase tracking-wide">
                        Order Details
                    </h2>
                    <p class="text-sm text-neutral-600 mt-1">Order #{{ $order->order_number }}</p>
                </div>
                <div class="text-right">
                    <span class="inline-block bg-yellow-100 border-2 border-yellow-600 px-4 py-2 text-sm font-bold text-yellow-800 uppercase">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <!-- Customer & Shipping Info -->
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h3 class="text-sm font-bold text-neutral-700 uppercase tracking-wide mb-3">Customer Information</h3>
                    <p class="text-neutral-900 font-bold">{{ $order->customer_name }}</p>
                    <p class="text-sm text-neutral-600">{{ $order->customer_email }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-neutral-700 uppercase tracking-wide mb-3">Shipping Address</h3>
                    <p class="text-sm text-neutral-900 whitespace-pre-line">{{ $order->shipping_address }}</p>
                </div>
            </div>

            <!-- Order Items -->
            <div>
                <h3 class="text-sm font-bold text-neutral-700 uppercase tracking-wide mb-4">Items Ordered</h3>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div class="flex gap-4 pb-4 border-b-2 border-neutral-100 last:border-b-0">
                            <!-- Book Image -->
                            <div class="flex-shrink-0">
                                @if($item->book->hasMedia('book_cover'))
                                    <img src="{{ $item->book->getFirstMediaUrl('book_cover', 'preview') }}"
                                         alt="{{ $item->book->title }}"
                                         class="w-20 h-24 object-cover border-2 border-neutral-900">
                                @else
                                    <div class="w-20 h-24 bg-gradient-to-br from-coral to-red-600 border-2 border-neutral-900 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Book Details -->
                            <div class="flex-1">
                                <h4 class="font-bold text-neutral-900">{{ $item->book->title }}</h4>
                                <p class="text-sm text-neutral-600">by {{ $item->book->author }}</p>
                                <div class="flex items-center justify-between mt-2">
                                    <span class="text-sm text-neutral-600">Qty: {{ $item->quantity }} × ${{ number_format($item->price, 2) }}</span>
                                    <span class="font-bold text-coral">${{ number_format($item->total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Total -->
                <div class="mt-6 pt-6 border-t-2 border-neutral-900 space-y-2">
                    <div class="flex items-center justify-between text-neutral-700">
                        <span>Subtotal</span>
                        <span class="font-bold">${{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-neutral-700">
                        <span>Tax (10%)</span>
                        <span class="font-bold">${{ number_format($order->tax, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-neutral-700">
                        <span>Shipping</span>
                        <span class="font-bold text-green-600">FREE</span>
                    </div>
                    <div class="pt-3 border-t-2 border-neutral-900 flex items-center justify-between">
                        <span class="text-lg font-bold uppercase">Total Paid</span>
                        <span class="text-3xl font-black font-display text-coral">${{ number_format($order->total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex gap-4 justify-center">
            <a href="{{ route('books.index') }}"
               class="inline-block bg-coral text-white px-8 py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                Continue Shopping
            </a>
            <a href="{{ route('home') }}"
               class="inline-block bg-white text-neutral-900 px-8 py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                Back to Home
            </a>
        </div>
    </div>
</div>
@endsection
