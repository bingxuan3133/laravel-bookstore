@extends('layouts.users')

@section('title', 'Checkout - Bookoo')

@section('content')
<div class="min-h-screen py-12 bg-neutral-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-black font-display text-neutral-900 mb-2">Checkout</h1>
            <p class="text-neutral-600">Complete your order</p>
        </div>

        @if(session('error'))
            <div class="mb-6 bg-red-50 border-3 border-red-600 p-4 shadow-brutal">
                <p class="text-red-800 font-bold">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Step Indicator -->
        <div class="mb-8">
            <div class="flex items-center justify-center gap-4">
                <div class="flex items-center">
                    <div id="step1-indicator" class="w-10 h-10 rounded-full border-3 border-neutral-900 bg-coral text-white flex items-center justify-center font-bold">
                        1
                    </div>
                    <span id="step1-label" class="ml-2 font-bold text-neutral-900">Review Order</span>
                </div>
                <div class="w-16 h-1 bg-neutral-300"></div>
                <div class="flex items-center">
                    <div id="step2-indicator" class="w-10 h-10 rounded-full border-3 border-neutral-900 bg-white text-neutral-400 flex items-center justify-center font-bold">
                        2
                    </div>
                    <span id="step2-label" class="ml-2 font-bold text-neutral-400">Customer Info</span>
                </div>
            </div>
        </div>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Checkout Form -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Step 1: Order Items Review -->
                    <div id="step1" class="step-content">
                        <div class="bg-white border-3 border-neutral-900 shadow-brutal p-6">
                            <h2 class="text-xl font-black font-display text-neutral-900 mb-6 uppercase tracking-wide">
                                Step 1: Review Your Order
                            </h2>

                            <div class="space-y-4 mb-6">
                                @foreach($cart as $bookId => $item)
                                    @php
                                        $book = $books[$bookId] ?? null;
                                        $itemTotal = $book ? $book->price * $item['quantity'] : 0;
                                    @endphp
                                    @if($book)
                                    <div class="flex gap-4 pb-4 border-b-2 border-neutral-100 last:border-b-0">
                                        <!-- Book Image -->
                                        <div class="flex-shrink-0">
                                            @if($book->hasMedia('book_cover'))
                                                <img src="{{ $book->getFirstMediaUrl('book_cover', 'preview') }}"
                                                     alt="{{ $book->title }}"
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
                                            <h3 class="font-bold text-neutral-900">{{ $book->title }}</h3>
                                            <p class="text-sm text-neutral-600">by {{ $book->author }}</p>
                                            <p class="text-xs text-neutral-500 mt-1">
                                                Sold by {{ $book->seller->store_name ?? 'N/A' }}
                                            </p>
                                            <div class="flex items-center justify-between mt-2">
                                                <span class="text-sm text-neutral-600">Qty: {{ $item['quantity'] }}</span>
                                                <span class="font-bold text-coral">${{ number_format($itemTotal, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>

                            <button type="button" onclick="goToStep(2)"
                                    class="w-full bg-coral text-white py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                                Continue to Customer Information
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Customer Information -->
                    <div id="step2" class="step-content hidden">
                        <div class="bg-white border-3 border-neutral-900 shadow-brutal p-6">
                            <h2 class="text-xl font-black font-display text-neutral-900 mb-6 uppercase tracking-wide">
                                Step 2: Customer Information
                            </h2>

                            <div class="space-y-4">
                                <div>
                                    <label for="customer_name" class="block text-sm font-bold text-neutral-700 mb-2 uppercase tracking-wide">
                                        Full Name *
                                    </label>
                                    <input type="text"
                                           id="customer_name"
                                           name="customer_name"
                                           value="{{ old('customer_name', Auth::user()->name ?? '') }}"
                                           required
                                           class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-2 focus:ring-coral @error('customer_name') border-red-600 @enderror">
                                    @error('customer_name')
                                        <p class="mt-1 text-sm text-red-600 font-bold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="customer_email" class="block text-sm font-bold text-neutral-700 mb-2 uppercase tracking-wide">
                                        Email Address *
                                    </label>
                                    <input type="email"
                                           id="customer_email"
                                           name="customer_email"
                                           value="{{ old('customer_email', Auth::user()->email ?? '') }}"
                                           required
                                           class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-2 focus:ring-coral @error('customer_email') border-red-600 @enderror">
                                    @error('customer_email')
                                        <p class="mt-1 text-sm text-red-600 font-bold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="shipping_address" class="block text-sm font-bold text-neutral-700 mb-2 uppercase tracking-wide">
                                        Shipping Address *
                                    </label>
                                    <textarea id="shipping_address"
                                              name="shipping_address"
                                              rows="4"
                                              required
                                              class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-2 focus:ring-coral @error('shipping_address') border-red-600 @enderror">{{ old('shipping_address') }}</textarea>
                                    @error('shipping_address')
                                        <p class="mt-1 text-sm text-red-600 font-bold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex gap-3 mt-6">
                                <button type="button" onclick="goToStep(1)"
                                        class="flex-1 bg-white text-neutral-900 py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                                    Back
                                </button>
                                <button type="submit" id="submit-button"
                                        class="flex-1 bg-coral text-white py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                                    Place Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-6 sticky top-24">
                        <h2 class="text-xl font-black font-display text-neutral-900 mb-6 uppercase tracking-wide">
                            Order Summary
                        </h2>

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-neutral-700">
                                <span>Subtotal</span>
                                <span class="font-bold">${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-neutral-700">
                                <span>Tax (10%)</span>
                                <span class="font-bold">${{ number_format($tax, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-neutral-700">
                                <span>Shipping</span>
                                <span class="font-bold text-green-600">FREE</span>
                            </div>
                            <div class="border-t-2 border-neutral-900 pt-3 flex justify-between items-baseline">
                                <span class="text-lg font-bold uppercase">Total</span>
                                <span class="text-3xl font-black font-display text-coral">${{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <a href="{{ route('cart.index') }}"
                           class="block w-full text-center text-neutral-600 hover:text-coral transition-colors font-bold uppercase text-xs tracking-wide">
                            Back to Cart
                        </a>

                        <!-- Security Notice -->
                        <div class="mt-6 pt-6 border-t-2 border-neutral-200">
                            <div class="flex items-start gap-2 text-xs text-neutral-600">
                                <svg class="w-4 h-4 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                <p>Your payment information is secure and encrypted.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function goToStep(step) {
    // Hide all steps
    document.querySelectorAll('.step-content').forEach(el => el.classList.add('hidden'));

    // Show selected step
    document.getElementById('step' + step).classList.remove('hidden');

    // Update step indicators
    if (step === 1) {
        document.getElementById('step1-indicator').classList.remove('bg-white', 'text-neutral-400');
        document.getElementById('step1-indicator').classList.add('bg-coral', 'text-white');
        document.getElementById('step1-label').classList.remove('text-neutral-400');
        document.getElementById('step1-label').classList.add('text-neutral-900');

        document.getElementById('step2-indicator').classList.remove('bg-coral', 'text-white');
        document.getElementById('step2-indicator').classList.add('bg-white', 'text-neutral-400');
        document.getElementById('step2-label').classList.remove('text-neutral-900');
        document.getElementById('step2-label').classList.add('text-neutral-400');
    } else {
        document.getElementById('step1-indicator').classList.remove('bg-coral', 'text-white');
        document.getElementById('step1-indicator').classList.add('bg-white', 'text-neutral-400');
        document.getElementById('step1-label').classList.remove('text-neutral-900');
        document.getElementById('step1-label').classList.add('text-neutral-400');

        document.getElementById('step2-indicator').classList.remove('bg-white', 'text-neutral-400');
        document.getElementById('step2-indicator').classList.add('bg-coral', 'text-white');
        document.getElementById('step2-label').classList.remove('text-neutral-400');
        document.getElementById('step2-label').classList.add('text-neutral-900');
    }

    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
@endsection
