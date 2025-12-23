@extends('layouts.users')

@section('title', 'Shopping Cart - Bookoo')

@section('content')
<div class="min-h-screen py-12 bg-neutral-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-black font-display text-neutral-900 mb-2">Shopping Cart</h1>
            <p class="text-neutral-600">Review your items before checkout</p>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-50 border-3 border-green-600 p-4 shadow-brutal">
                <p class="text-green-800 font-bold">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-50 border-3 border-red-600 p-4 shadow-brutal">
                <p class="text-red-800 font-bold">{{ session('error') }}</p>
            </div>
        @endif

        @php
            $cart = session('cart', []);
        @endphp

        @if(count($cart) > 0)
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-4">
                    @foreach($cart as $bookId => $item)
                        @php
                            $book = $books->firstWhere('id', $bookId);
                        @endphp
                        @if($book)
                            <div class="bg-white border-3 border-neutral-900 shadow-brutal p-6">
                                <div class="flex gap-6">
                                    <!-- Book Image -->
                                    <div class="flex-shrink-0">
                                        @if($book->hasMedia('book_cover'))
                                            <img src="{{ $book->getFirstMediaUrl('book_cover', 'preview') }}"
                                                 alt="{{ $book->title }}"
                                                 class="w-32 h-40 object-cover border-3 border-neutral-900">
                                        @else
                                            <div class="w-32 h-40 bg-gradient-to-br from-coral to-red-600 border-3 border-neutral-900 flex items-center justify-center">
                                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Book Details -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-xl font-bold font-display text-neutral-900 mb-1">{{ $book->title }}</h3>
                                        <p class="text-neutral-600 mb-2">by {{ $book->author }}</p>
                                        <p class="text-sm text-neutral-500 mb-3">
                                            Sold by <span class="font-bold text-neutral-700">{{ $book->seller->store_name ?? 'N/A' }}</span>
                                        </p>

                                        <!-- Stock Warning -->
                                        @if($book->stock < $item['quantity'])
                                            <div class="mb-3 bg-yellow-50 border-2 border-yellow-600 p-3">
                                                <p class="text-sm text-yellow-800 font-bold">
                                                    ⚠️ Only {{ $book->stock }} left in stock! Please adjust quantity.
                                                </p>
                                            </div>
                                        @elseif($book->stock <= 5)
                                            <div class="mb-3 bg-yellow-50 border-2 border-yellow-600 p-3">
                                                <p class="text-sm text-yellow-800 font-bold">
                                                    Only {{ $book->stock }} left in stock
                                                </p>
                                            </div>
                                        @endif

                                        <div class="flex items-center justify-between mt-4">
                                            <!-- Quantity Controls -->
                                            <div class="flex items-center gap-3">
                                                <span class="text-sm font-bold text-neutral-700 uppercase">Qty:</span>
                                                <div class="flex items-center border-3 border-neutral-900">
                                                    <form action="{{ route('cart.update', $book->id) }}" method="POST" class="inline" onsubmit="return {{ $item['quantity'] <= 1 ? 'confirm(\'This will remove the item from your cart. Continue?\')' : 'true' }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="quantity" value="{{ max(0, $item['quantity'] - 1) }}">
                                                        <button type="submit" class="px-3 py-1 hover:bg-neutral-100 font-bold">-</button>
                                                    </form>
                                                    <span class="px-4 py-1 border-x-3 border-neutral-900 font-bold">{{ $item['quantity'] }}</span>
                                                    <form action="{{ route('cart.update', $book->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                                                        <button type="submit" class="px-3 py-1 hover:bg-neutral-100 font-bold" {{ $book->stock <= $item['quantity'] ? 'disabled' : '' }}>+</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Price -->
                                            <div class="text-right">
                                                <p class="text-2xl font-black font-display text-coral">
                                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                                </p>
                                                <p class="text-xs text-neutral-500">${{ number_format($item['price'], 2) }} each</p>
                                            </div>
                                        </div>

                                        <!-- Remove Button -->
                                        <form action="{{ route('cart.remove', $book->id) }}" method="POST" class="mt-4" onsubmit="return confirm('Remove this item from cart?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm font-bold text-red-600 hover:underline uppercase">
                                                Remove from Cart
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Book not found - show error -->
                            <div class="bg-red-50 border-3 border-red-600 p-4">
                                <p class="text-red-800 font-bold">Item no longer available</p>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-6 sticky top-24">
                        <h2 class="text-xl font-black font-display text-neutral-900 mb-6 uppercase tracking-wide">Order Summary</h2>

                        @php
                            $subtotal = 0;
                            $hasStockIssues = false;
                            foreach($cart as $bookId => $item) {
                                $subtotal += $item['price'] * $item['quantity'];
                                $book = $books->firstWhere('id', $bookId);
                                if($book && $book->stock < $item['quantity']) {
                                    $hasStockIssues = true;
                                }
                            }
                            $tax = $subtotal * 0.10; // 10% tax
                            $total = $subtotal + $tax;
                        @endphp

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-neutral-700">
                                <span>Subtotal ({{ count($cart) }} items)</span>
                                <span class="font-bold">${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-neutral-700">
                                <span>Tax (10%)</span>
                                <span class="font-bold">${{ number_format($tax, 2) }}</span>
                            </div>
                            <div class="border-t-2 border-neutral-900 pt-3 flex justify-between items-baseline">
                                <span class="text-lg font-bold uppercase">Total</span>
                                <span class="text-3xl font-black font-display text-coral">${{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        @if($hasStockIssues)
                            <p class="text-sm text-red-600 font-bold mb-4">
                                Please adjust quantities before proceeding to checkout
                            </p>
                            <button disabled class="w-full bg-neutral-300 text-neutral-500 py-4 border-3 border-neutral-900 font-bold uppercase text-sm tracking-wide cursor-not-allowed">
                                Proceed to Checkout
                            </button>
                        @else
                            <a href="{{ route('checkout.index') }}" class="block w-full bg-coral text-white py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide text-center">
                                Proceed to Checkout
                            </a>
                        @endif

                        <a href="{{ route('books.index') }}" class="block w-full text-center mt-3 text-neutral-600 hover:text-coral transition-colors font-bold uppercase text-xs tracking-wide">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart -->
            <div class="bg-white border-3 border-neutral-900 shadow-brutal p-12 text-center">
                <svg class="w-24 h-24 text-neutral-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <h2 class="text-3xl font-black font-display text-neutral-900 mb-3">Your cart is empty</h2>
                <p class="text-neutral-600 mb-8">Start adding some books to get started!</p>
                <a href="{{ route('books.index') }}" class="inline-block bg-coral text-white px-8 py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                    Browse Books
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
