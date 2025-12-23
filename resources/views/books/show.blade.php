@extends('layouts.users')

@section('title', $book->title . ' - Bookoo')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-neutral-100 border-b-3 border-neutral-900 py-4">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="text-neutral-600 hover:text-coral transition-colors">Home</a>
                <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('books.index') }}" class="text-neutral-600 hover:text-coral transition-colors">Browse</a>
                @if($book->category)
                <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('books.index', ['category' => $book->category->slug]) }}" class="text-neutral-600 hover:text-coral transition-colors">{{ $book->category->name }}</a>
                @endif
                <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-neutral-900 font-medium truncate">{{ $book->title }}</span>
            </nav>
        </div>
    </section>

    <!-- Book Detail -->
    <section class="py-12 bg-white">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-[1fr_400px] gap-12">
                <!-- Left Column - Book Info -->
                <div>
                    <div class="grid md:grid-cols-[400px_1fr] gap-8 mb-12">
                        <!-- Book Cover -->
                        <div>
                            @if($book->hasMedia('book_cover'))
                                <img src="{{ $book->getFirstMediaUrl('book_cover') }}"
                                     alt="{{ $book->title }}"
                                     class="w-full aspect-[3/4] object-cover border-4 border-neutral-900 shadow-brutal">
                            @else
                                <div class="w-full aspect-[3/4] bg-gradient-to-br from-coral to-red-600 border-4 border-neutral-900 shadow-brutal flex items-center justify-center p-8">
                                    <h2 class="text-white font-display font-bold text-3xl text-center leading-tight">{{ $book->title }}</h2>
                                </div>
                            @endif

                            <!-- Condition Badge -->
                            <div class="mt-4 inline-block bg-sage border-3 border-neutral-900 px-4 py-2 shadow-brutal">
                                <span class="font-bold text-sm uppercase tracking-wide">Condition: {{ $book->condition ?? 'New' }}</span>
                            </div>
                        </div>

                        <!-- Book Details -->
                        <div>
                            <!-- Title & Author -->
                            <div class="mb-6">
                                <h1 class="text-4xl lg:text-5xl font-black font-display mb-3 leading-tight">{{ $book->title }}</h1>
                                <p class="text-2xl text-neutral-600 font-medium mb-2">by {{ $book->author }}</p>
                                @if($book->category)
                                <a href="{{ route('books.index', ['category' => $book->category->slug]) }}" class="inline-block bg-sage/20 border-2 border-sage text-sage px-3 py-1 text-sm font-bold uppercase tracking-wide hover:bg-sage hover:text-white transition-colors">
                                    {{ $book->category->name }}
                                </a>
                                @endif
                            </div>

                            <!-- Price -->
                            <div class="mb-8 p-6 bg-neutral-50 border-3 border-neutral-900">
                                <div class="flex items-baseline gap-3 mb-2">
                                    <span class="text-5xl font-black font-display text-coral">${{ number_format($book->price, 2) }}</span>
                                    @if($book->stock > 0)
                                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 border-2 border-green-400 text-green-700 text-xs font-bold uppercase">
                                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                            In Stock ({{ $book->stock }})
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-red-100 border-2 border-red-400 text-red-700 text-xs font-bold uppercase">
                                            Out of Stock
                                        </span>
                                    @endif
                                </div>
                                <p class="text-sm text-neutral-600">Shipping calculated at checkout</p>
                            </div>

                            <!-- Add to Cart -->
                            @if($book->stock > 0)
                            <form action="{{ route('cart.add') }}" method="POST" class="mb-6">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <div class="flex gap-4 mb-4">
                                    <div class="w-24">
                                        <label class="block text-xs font-bold mb-2 uppercase tracking-wide">Qty</label>
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $book->stock }}" class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:border-coral transition-colors font-bold text-center">
                                    </div>
                                    <div class="flex-1">
                                        <label class="block text-xs font-bold mb-2 uppercase tracking-wide opacity-0">Add</label>
                                        <button type="submit" class="w-full bg-coral text-white py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <div class="mb-6 p-4 bg-red-50 border-3 border-red-500">
                                <p class="text-red-700 font-bold text-sm">This book is currently out of stock</p>
                            </div>
                            @endif

                            <!-- Book Info Grid -->
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white border-3 border-neutral-900 p-4">
                                    <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Publisher</p>
                                    <p class="font-bold">{{ $book->publisher ?? 'N/A' }}</p>
                                </div>
                                <div class="bg-white border-3 border-neutral-900 p-4">
                                    <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Year</p>
                                    <p class="font-bold">{{ $book->year ?? 'N/A' }}</p>
                                </div>
                                <div class="bg-white border-3 border-neutral-900 p-4">
                                    <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Pages</p>
                                    <p class="font-bold">{{ $book->pages ?? 'N/A' }}</p>
                                </div>
                                <div class="bg-white border-3 border-neutral-900 p-4">
                                    <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Language</p>
                                    <p class="font-bold">{{ $book->language ?? 'N/A' }}</p>
                                </div>
                                @if($book->isbn)
                                <div class="bg-white border-3 border-neutral-900 p-4 col-span-2">
                                    <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">ISBN</p>
                                    <p class="font-bold">{{ $book->isbn }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($book->description)
                    <div class="mb-12">
                        <h2 class="text-3xl font-black font-display mb-4 uppercase tracking-tight pb-3 border-b-4 border-neutral-900">Description</h2>
                        <div class="prose max-w-none">
                            <p class="text-neutral-700 leading-relaxed">{{ $book->description }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Right Column - Seller Info -->
                <div>
                    <div class="sticky top-24">
                        <!-- Seller Card -->
                        <div class="bg-neutral-50 border-4 border-neutral-900 shadow-brutal p-6 mb-6">
                            <h3 class="text-xl font-black font-display uppercase tracking-tight mb-4 pb-3 border-b-3 border-neutral-900">Sold By</h3>

                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-16 h-16 bg-coral border-3 border-neutral-900 flex items-center justify-center flex-shrink-0">
                                    <span class="text-2xl font-black text-white">{{ strtoupper(substr($book->seller->store_name, 0, 1)) }}</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-xl font-bold mb-1 truncate">{{ $book->seller->store_name }}</h4>
                                    <p class="text-sm text-neutral-600">Member since {{ $book->seller->created_at->format('Y') }}</p>
                                </div>
                            </div>

                            @if($book->seller->description)
                            <div class="mb-6 p-4 bg-white border-2 border-neutral-200">
                                <p class="text-sm text-neutral-700 leading-relaxed">{{ Str::limit($book->seller->description, 150) }}</p>
                            </div>
                            @endif

                            <!-- Seller Stats -->
                            <div class="grid grid-cols-2 gap-3 mb-6">
                                <div class="bg-white border-2 border-neutral-900 p-3 text-center">
                                    <p class="text-2xl font-black font-display text-coral">{{ $book->seller->books()->where('is_active', true)->count() }}</p>
                                    <p class="text-xs font-bold uppercase tracking-wide text-neutral-600">Books Listed</p>
                                </div>
                                <div class="bg-white border-2 border-neutral-900 p-3 text-center">
                                    <p class="text-2xl font-black font-display text-sage">4.8</p>
                                    <p class="text-xs font-bold uppercase tracking-wide text-neutral-600">Rating</p>
                                </div>
                            </div>

                            <a href="#" class="block w-full text-center bg-white text-neutral-900 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                                View Seller Profile
                            </a>
                        </div>

                        <!-- Shipping Info -->
                        <div class="bg-sage/20 border-3 border-sage p-6">
                            <h3 class="text-lg font-black font-display uppercase tracking-tight mb-4">Shipping & Returns</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-sage flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <p class="text-neutral-700">Fast shipping within 1-3 business days</p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-sage flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <p class="text-neutral-700">30-day return policy</p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-sage flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <p class="text-neutral-700">Secure packaging guaranteed</p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-sage flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <p class="text-neutral-700">Buyer protection included</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Books -->
    @if($relatedBooks->count() > 0)
    <section class="py-12 bg-neutral-50 border-t-4 border-neutral-900">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-8">
            <div class="flex items-end justify-between mb-8 pb-4 border-b-3 border-neutral-900">
                <div>
                    <h2 class="text-4xl font-black font-display mb-2 tracking-tight">More Like This</h2>
                    <p class="text-neutral-600">Similar books you might enjoy</p>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($relatedBooks as $index => $relatedBook)
                <a href="{{ route('books.show', $relatedBook->id) }}" class="group">
                    <div class="relative bg-gradient-to-br from-neutral-700 to-neutral-900 aspect-[3/4] border-4 border-neutral-900 shadow-brutal mb-3 overflow-hidden group-hover:-translate-y-2 transition-all duration-300">
                        @if($relatedBook->hasMedia('book_cover'))
                            <img src="{{ $relatedBook->getFirstMediaUrl('book_cover', 'preview') }}"
                                 alt="{{ $relatedBook->title }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="absolute inset-0 flex items-center justify-center text-white font-display font-bold text-lg text-center p-4 bg-gradient-to-br {{ ['from-coral to-red-600', 'from-sage to-green-700', 'from-amber-500 to-orange-600', 'from-blue-500 to-indigo-700'][$index % 4] }}">
                                {{ Str::limit($relatedBook->title, 30) }}
                            </div>
                        @endif
                        <div class="absolute top-3 right-3 bg-white border-3 border-neutral-900 px-2 py-1 shadow-brutal-sm">
                            <span class="font-black text-sm text-coral">${{ number_format($relatedBook->price, 2) }}</span>
                        </div>
                    </div>
                    <h3 class="font-bold text-sm leading-tight group-hover:text-coral transition-colors line-clamp-2 mb-1">{{ $relatedBook->title }}</h3>
                    <p class="text-xs text-neutral-600">{{ $relatedBook->author }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
