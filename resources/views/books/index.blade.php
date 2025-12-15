@extends('layouts.users')

@section('title', 'Browse Books - Bookoo')

@section('content')
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
                            <a href="?category={{ $category->slug }}" class="block py-2 px-3 {{ request('category') == $category->slug ? 'bg-coral text-white border-3 border-neutral-900' : 'hover:bg-neutral-100' }} font-medium transition-colors">
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
                                <span class="text-sm font-medium">Category: {{ $categories->firstWhere('slug', request('category'))->name ?? 'Unknown' }}</span>
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
                        <div class="group">
                            <!-- Book Cover -->
                            <a href="{{ route('books.show', $book->id) }}" class="block relative bg-gradient-to-br from-neutral-700 to-neutral-900 aspect-[3/4] border-4 border-neutral-900 shadow-brutal mb-4 overflow-hidden group-hover:-translate-y-2 transition-all duration-300">
                                @if($book->hasMedia('book_covers'))
                                    <img src="{{ $book->getFirstMediaUrl('book_covers', 'preview') }}"
                                         alt="{{ $book->title }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center text-white font-display font-bold text-2xl text-center p-6 bg-gradient-to-br {{ ['from-coral to-red-600', 'from-sage to-green-700', 'from-amber-500 to-orange-600', 'from-blue-500 to-indigo-700', 'from-purple-500 to-pink-600', 'from-teal-500 to-cyan-600'][$index % 6] }}">
                                        {{ $book->title ?? 'Book Title' }}
                                    </div>
                                @endif

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-neutral-900/90 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="bg-coral text-white px-6 py-3 border-3 border-white shadow-brutal-sm font-bold uppercase text-sm tracking-wide hover:scale-105 transition-transform">
                                        View Details
                                    </span>
                                </div>

                                <!-- Price Tag -->
                                <div class="absolute top-4 right-4 bg-white border-3 border-neutral-900 px-3 py-1.5 shadow-brutal-sm">
                                    <span class="font-black text-lg text-coral">${{ number_format($book->price, 2) }}</span>
                                </div>

                                <!-- Condition Badge -->
                                <div class="absolute top-4 left-4 bg-sage text-neutral-900 border-3 border-neutral-900 px-3 py-1 shadow-brutal-sm">
                                    <span class="font-bold text-xs uppercase tracking-wide">{{ $book->condition ?? 'New' }}</span>
                                </div>

                                @if($book->stock <= 0)
                                <!-- Out of Stock Badge -->
                                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-red-500 text-white border-3 border-neutral-900 px-4 py-2 shadow-brutal-sm">
                                    <span class="font-bold text-xs uppercase tracking-wide">Out of Stock</span>
                                </div>
                                @endif
                            </a>

                            <!-- Book Info -->
                            <div class="space-y-2">
                                <a href="{{ route('books.show', $book->id) }}">
                                    <h3 class="font-display font-bold text-xl leading-tight hover:text-coral transition-colors line-clamp-2">
                                        {{ $book->title ?? 'Book Title' }}
                                    </h3>
                                </a>
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
                                    <span class="text-xs text-neutral-500">by <span class="font-bold text-neutral-900">{{ $book->seller->store_name ?? 'Seller Name' }}</span></span>
                                </div>

                                <!-- Add to Cart Button -->
                                @if($book->stock > 0)
                                <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-full bg-coral text-white py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                                        Add to Cart
                                    </button>
                                </form>
                                @else
                                <button disabled class="w-full bg-neutral-300 text-neutral-500 py-3 border-3 border-neutral-400 cursor-not-allowed font-bold uppercase text-sm tracking-wide mt-3">
                                    Out of Stock
                                </button>
                                @endif
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
@endsection
