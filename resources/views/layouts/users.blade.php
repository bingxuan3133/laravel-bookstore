<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bookoo - Books for Everyone')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-50 text-neutral-900 font-body">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-neutral-900 border-b-4 border-coral shadow-brutal">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-coral border-3 border-neutral-900 rotate-3 group-hover:rotate-12 transition-transform duration-300 flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 2.05v3.03c3.39.49 6 3.39 6 6.92 0 .9-.18 1.75-.48 2.54l2.6 1.53c.56-1.24.88-2.62.88-4.07 0-5.18-3.95-9.45-9-9.95zM12 19c-3.87 0-7-3.13-7-7 0-3.53 2.61-6.43 6-6.92V2.05c-5.06.5-9 4.76-9 9.95 0 5.52 4.47 10 9.99 10 3.31 0 6.24-1.61 8.06-4.09l-2.6-1.53C16.17 17.98 14.21 19 12 19z"/>
                        </svg>
                    </div>
                    <span class="text-3xl font-bold font-display text-white tracking-tight">Bookoo</span>
                </a>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-white font-medium hover:text-coral transition-colors duration-200 uppercase text-sm tracking-wide">Home</a>
                    <a href="{{ route('books.index') }}" class="text-white font-medium hover:text-coral transition-colors duration-200 uppercase text-sm tracking-wide">Browse</a>
                    {{-- <a href="#new-arrivals" class="text-white font-medium hover:text-coral transition-colors duration-200 uppercase text-sm tracking-wide">New Arrivals</a> --}}
                </nav>

                <!-- Actions -->
                <div class="flex items-center gap-4">
                    <button class="text-white hover:text-coral transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>

                    @auth
                        <div class="relative group">
                            <button class="text-white hover:text-coral transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white border-3 border-neutral-900 shadow-brutal opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                <div class="p-4 border-b-2 border-neutral-200">
                                    <p class="font-bold text-sm">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-neutral-600">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-coral hover:text-white transition-colors">My Orders</a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-coral hover:text-white transition-colors">Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-coral hover:text-white transition-colors">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-coral transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </a>
                    @endauth

                    <!-- Cart Dropdown -->
                    <div class="relative group">
                        <a href="{{ route('cart.index') }}" class="bg-coral text-white px-6 py-2.5 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span>Cart ({{ count(session('cart', [])) }})</span>
                        </a>

                        <!-- Cart Dropdown Content (hidden on cart page) -->
                        @if(!request()->routeIs('cart.index') && !request()->routeIs('checkout.*'))
                        @php
                            $cart = session('cart', []);
                            $cartTotal = 0;
                        @endphp
                        @if(count($cart) > 0)
                        <div class="absolute right-0 mt-2 w-96 bg-white border-4 border-neutral-900 shadow-brutal opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="px-4 py-3 border-b-3 border-neutral-900 bg-neutral-50">
                                <h3 class="font-bold text-sm uppercase tracking-wide">Shopping Cart</h3>
                            </div>

                            <div class="max-h-96 overflow-y-auto">
                                @foreach($cart as $bookId => $item)
                                    @php
                                        $book = \App\Models\Book::find($bookId);
                                        if($book) {
                                            $itemTotal = $book->price * $item['quantity'];
                                            $cartTotal += $itemTotal;
                                        }
                                    @endphp
                                    @if($book)
                                    <div class="p-4 border-b-2 border-neutral-100 hover:bg-neutral-50 transition-colors">
                                        <div class="flex gap-3">
                                            @if($book->hasMedia('book_cover'))
                                                <img src="{{ $book->getFirstMediaUrl('book_cover', 'preview') }}"
                                                     alt="{{ $book->title }}"
                                                     class="w-16 h-20 object-cover border-2 border-neutral-900 flex-shrink-0">
                                            @else
                                                <div class="w-16 h-20 bg-gradient-to-br from-coral to-red-600 border-2 border-neutral-900 flex items-center justify-center flex-shrink-0">
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="flex-1 min-w-0">
                                                <h4 class="font-bold text-sm truncate">{{ $book->title }}</h4>
                                                <p class="text-xs text-neutral-600">{{ $book->author }}</p>
                                                <div class="flex items-center justify-between mt-2">
                                                    <span class="text-xs text-neutral-500">Qty: {{ $item['quantity'] }}</span>
                                                    <span class="font-bold text-coral">${{ number_format($itemTotal, 2) }}</span>
                                                    <!-- Remove button -->
                                                    <form action="{{ route('cart.remove', $book->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Remove this item from cart?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="text-xs font-bold text-red-600 hover:underline uppercase">
                                                            Remove
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="p-4 border-t-3 border-neutral-900 bg-neutral-50">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="font-bold uppercase tracking-wide text-sm">Total:</span>
                                    <span class="text-2xl font-black font-display text-coral">${{ number_format($cartTotal, 2) }}</span>
                                </div>
                                <a href={{ route('cart.index') }} class="block w-full text-center bg-coral text-white py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                                    View Cart
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="absolute right-0 mt-2 w-80 bg-white border-4 border-neutral-900 shadow-brutal opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="p-8 text-center">
                                <svg class="w-16 h-16 text-neutral-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <h3 class="font-bold text-lg mb-1">Your cart is empty</h3>
                                <p class="text-sm text-neutral-600 mb-4">Add some books to get started!</p>
                                <a href="{{ route('books.index') }}" class="inline-block bg-coral text-white px-6 py-2 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-xs tracking-wide">
                                    Browse Books
                                </a>
                            </div>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-neutral-900 border-t-4 border-coral py-16">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 mb-12">
                <!-- Brand -->
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-coral border-3 border-white rotate-3 flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13 2.05v3.03c3.39.49 6 3.39 6 6.92 0 .9-.18 1.75-.48 2.54l2.6 1.53c.56-1.24.88-2.62.88-4.07 0-5.18-3.95-9.45-9-9.95zM12 19c-3.87 0-7-3.13-7-7 0-3.53 2.61-6.43 6-6.92V2.05c-5.06.5-9 4.76-9 9.95 0 5.52 4.47 10 9.99 10 3.31 0 6.24-1.61 8.06-4.09l-2.6-1.53C16.17 17.98 14.21 19 12 19z"/>
                            </svg>
                        </div>
                        <span class="text-3xl font-bold font-display text-white tracking-tight">Bookoo</span>
                    </div>
                    <p class="text-neutral-400 leading-relaxed max-w-md">
                        Your marketplace for books. Connecting readers with sellers, stories with seekers, and communities with culture.
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <h4 class="text-white font-bold uppercase tracking-wide text-sm mb-4">Shop</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">All Books</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">New Arrivals</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">Categories</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">Best Sellers</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold uppercase tracking-wide text-sm mb-4">Sell</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('register', ['as' => 'seller']) }}" class="text-neutral-400 hover:text-coral transition-colors">Become a Seller</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">Seller Dashboard</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">Pricing</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">Resources</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold uppercase tracking-wide text-sm mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">Shipping Info</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">Returns</a></li>
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t-2 border-neutral-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-neutral-500 text-sm">© 2025 Bookoo. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="text-neutral-500 hover:text-coral transition-colors text-sm">Privacy Policy</a>
                    <a href="#" class="text-neutral-500 hover:text-coral transition-colors text-sm">Terms of Service</a>
                    <a href="#" class="text-neutral-500 hover:text-coral transition-colors text-sm">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
