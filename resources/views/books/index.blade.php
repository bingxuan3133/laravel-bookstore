<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Browse Books - Bookoo</title>
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
                    <a href="#" class="text-coral font-medium transition-colors duration-200 uppercase text-sm tracking-wide">Browse</a>
                    <a href="#" class="text-white font-medium hover:text-coral transition-colors duration-200 uppercase text-sm tracking-wide">New Arrivals</a>
                    <a href="#" class="text-white font-medium hover:text-coral transition-colors duration-200 uppercase text-sm tracking-wide">Sellers</a>
                </nav>

                <!-- Actions -->
                <div class="flex items-center gap-4">
                    <button class="text-white hover:text-coral transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                    <a href="#" class="text-white hover:text-coral transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </a>
                    <button class="bg-coral text-white px-6 py-2.5 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                        Cart (0)
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <section class="bg-gradient-to-br from-sage/30 via-neutral-100 to-neutral-50 border-b-4 border-neutral-900 py-12">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-5xl lg:text-6xl font-black font-display mb-2 tracking-tight">Browse Books</h1>
                    <p class="text-neutral-600 text-lg">Explore our complete collection of {{ $books->total() }} books</p>
                </div>
                <a href="{{ route('home') }}" class="hidden md:flex items-center gap-2 text-neutral-600 hover:text-coral font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Home
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-white min-h-screen">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-[280px_1fr] gap-8">
                <!-- Sidebar Filters -->
                <aside class="space-y-6">
                    <!-- Search -->
                    <div class="bg-neutral-50 border-3 border-neutral-900 shadow-brutal p-6">
                        <h3 class="font-display font-bold text-lg mb-4 uppercase tracking-wide">Search</h3>
                        <form action="" method="GET">
                            <div class="relative">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Title or author..."
                                    class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:border-coral transition-colors font-medium"
                                >
                                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-600 hover:text-coral">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories Filter -->
                    <div class="bg-neutral-50 border-3 border-neutral-900 shadow-brutal p-6">
                        <h3 class="font-display font-bold text-lg mb-4 uppercase tracking-wide">Categories</h3>
                        <div class="space-y-2">
                            <a href="?" class="block py-2 px-3 {{ !request('category') ? 'bg-coral text-white border-3 border-neutral-900' : 'hover:bg-neutral-100' }} font-medium transition-colors">
                                All Books
                            </a>
                            @foreach($categories as $category)
                            <a href="?category={{ $category->id }}" class="block py-2 px-3 {{ request('category') == $category->id ? 'bg-coral text-white border-3 border-neutral-900' : 'hover:bg-neutral-100' }} font-medium transition-colors">
                                {{ $category->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Sort Filter -->
                    <div class="bg-neutral-50 border-3 border-neutral-900 shadow-brutal p-6">
                        <h3 class="font-display font-bold text-lg mb-4 uppercase tracking-wide">Sort By</h3>
                        <form action="" method="GET" id="sortForm">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            <select name="sort" onchange="document.getElementById('sortForm').submit()" class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:border-coral transition-colors font-medium bg-white">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title: A to Z</option>
                            </select>
                        </form>
                    </div>

                    <!-- Active Filters -->
                    @if(request('category') || request('search'))
                    <div class="bg-sage/20 border-3 border-sage p-6">
                        <h3 class="font-display font-bold text-sm mb-3 uppercase tracking-wide">Active Filters</h3>
                        <div class="space-y-2">
                            @if(request('search'))
                            <div class="flex items-center justify-between bg-white border-2 border-neutral-900 px-3 py-2">
                                <span class="text-sm font-medium">Search: "{{ request('search') }}"</span>
                                <a href="?{{ http_build_query(array_diff_key(request()->query(), ['search' => ''])) }}" class="text-coral hover:text-neutral-900">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </a>
                            </div>
                            @endif
                            @if(request('category'))
                            <div class="flex items-center justify-between bg-white border-2 border-neutral-900 px-3 py-2">
                                <span class="text-sm font-medium">Category: {{ $categories->find(request('category'))->name ?? 'Unknown' }}</span>
                                <a href="?{{ http_build_query(array_diff_key(request()->query(), ['category' => ''])) }}" class="text-coral hover:text-neutral-900">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </a>
                            </div>
                            @endif
                            <a href="?" class="block text-center py-2 text-sm text-neutral-600 hover:text-coral font-medium uppercase tracking-wide">Clear All</a>
                        </div>
                    </div>
                    @endif
                </aside>

                <!-- Books Grid -->
                <div>
                    <!-- Results Info -->
                    <div class="flex items-center justify-between mb-8 pb-4 border-b-3 border-neutral-900">
                        <div>
                            <p class="text-neutral-600">
                                Showing <span class="font-bold text-neutral-900">{{ $books->firstItem() ?? 0 }}-{{ $books->lastItem() ?? 0 }}</span> of <span class="font-bold text-neutral-900">{{ $books->total() }}</span> results
                            </p>
                        </div>
                        <div class="hidden md:block">
                            <span class="text-sm text-neutral-500 uppercase tracking-wide">Page {{ $books->currentPage() }} of {{ $books->lastPage() }}</span>
                        </div>
                    </div>

                    @if($books->count() > 0)
                    <!-- Books Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                        @foreach($books as $index => $book)
                        <div class="group cursor-pointer">
                            <!-- Book Cover -->
                            <div class="relative bg-gradient-to-br from-neutral-700 to-neutral-900 aspect-[3/4] border-4 border-neutral-900 shadow-brutal mb-4 overflow-hidden group-hover:-translate-y-2 transition-all duration-300">
                                <!-- Placeholder for book cover image -->
                                <div class="absolute inset-0 flex items-center justify-center text-white font-display font-bold text-2xl text-center p-6 bg-gradient-to-br {{ ['from-coral to-red-600', 'from-sage to-green-700', 'from-amber-500 to-orange-600', 'from-blue-500 to-indigo-700', 'from-purple-500 to-pink-600', 'from-teal-500 to-cyan-600'][$index % 6] }}">
                                    {{ $book->title ?? 'Book Title' }}
                                </div>

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-neutral-900/90 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <a href="#" class="bg-coral text-white px-6 py-3 border-3 border-white shadow-brutal-sm font-bold uppercase text-sm tracking-wide hover:scale-105 transition-transform">
                                        Quick View
                                    </a>
                                </div>

                                <!-- Price Tag -->
                                <div class="absolute top-4 right-4 bg-white border-3 border-neutral-900 px-3 py-1.5 shadow-brutal-sm">
                                    <span class="font-black text-lg text-coral">${{ $book->price ?? '24.99' }}</span>
                                </div>

                                <!-- Condition Badge -->
                                <div class="absolute top-4 left-4 bg-sage text-neutral-900 border-3 border-neutral-900 px-3 py-1 shadow-brutal-sm">
                                    <span class="font-bold text-xs uppercase tracking-wide">{{ $book->condition ?? 'New' }}</span>
                                </div>
                            </div>

                            <!-- Book Info -->
                            <div class="space-y-2">
                                <h3 class="font-display font-bold text-xl leading-tight group-hover:text-coral transition-colors line-clamp-2">
                                    {{ $book->title ?? 'Book Title' }}
                                </h3>
                                <p class="text-neutral-600 font-medium">{{ $book->author ?? 'Author Name' }}</p>

                                <div class="flex items-center gap-3 pt-2">
                                    <span class="text-xs text-neutral-500 uppercase tracking-wide">{{ $book->year ?? '2024' }}</span>
                                    <span class="text-neutral-300">•</span>
                                    <span class="text-xs text-neutral-500 uppercase tracking-wide">{{ $book->pages ?? '320' }} pages</span>
                                    @if($book->country)
                                    <span class="text-neutral-300">•</span>
                                    <span class="text-xs text-coral font-bold uppercase tracking-wide">{{ $book->country }}</span>
                                    @endif
                                </div>

                                <!-- Seller Info -->
                                <div class="flex items-center gap-2 pt-2">
                                    <div class="w-6 h-6 rounded-full bg-neutral-300 border-2 border-neutral-900"></div>
                                    <span class="text-xs text-neutral-500">by <span class="font-bold text-neutral-900">{{ $book->seller->name ?? 'Seller Name' }}</span></span>
                                </div>

                                <!-- Add to Cart -->
                                <button class="w-full bg-neutral-900 text-white py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide mt-3 opacity-0 group-hover:opacity-100">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if($books->hasPages())
                    <div class="flex items-center justify-center gap-4">
                        @if ($books->onFirstPage())
                            <span class="px-6 py-3 border-3 border-neutral-300 text-neutral-400 font-bold uppercase text-sm cursor-not-allowed">
                                Previous
                            </span>
                        @else
                            <a href="{{ $books->previousPageUrl() }}" class="bg-white text-neutral-900 px-6 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                                Previous
                            </a>
                        @endif

                        <div class="flex items-center gap-2">
                            @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url)
                                @if ($page == $books->currentPage())
                                    <span class="w-12 h-12 flex items-center justify-center bg-coral text-white border-3 border-neutral-900 shadow-brutal font-bold">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="w-12 h-12 flex items-center justify-center bg-white text-neutral-900 border-3 border-neutral-900 hover:bg-neutral-100 transition-colors font-bold">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        @if ($books->hasMorePages())
                            <a href="{{ $books->nextPageUrl() }}" class="bg-white text-neutral-900 px-6 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                                Next
                            </a>
                        @else
                            <span class="px-6 py-3 border-3 border-neutral-300 text-neutral-400 font-bold uppercase text-sm cursor-not-allowed">
                                Next
                            </span>
                        @endif
                    </div>
                    @endif

                    @else
                    <!-- No Results -->
                    <div class="text-center py-20">
                        <div class="inline-block bg-neutral-100 border-4 border-neutral-900 p-12 mb-6">
                            <svg class="w-24 h-24 text-neutral-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h3 class="text-2xl font-bold font-display mb-2">No Books Found</h3>
                            <p class="text-neutral-600 mb-6">Try adjusting your filters or search term</p>
                            <a href="?" class="inline-block bg-coral text-white px-8 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                                Clear Filters
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

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
                        <li><a href="#" class="text-neutral-400 hover:text-coral transition-colors">Become a Seller</a></li>
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
