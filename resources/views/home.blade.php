<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookoo - Books for Everyone</title>
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
                    <a href="{{ route('books.index') }}" class="text-white font-medium hover:text-coral transition-colors duration-200 uppercase text-sm tracking-wide">Browse</a>
                    <a href="#new-arrivals" class="text-white font-medium hover:text-coral transition-colors duration-200 uppercase text-sm tracking-wide">New Arrivals</a>
                    <a href="#categories" class="text-white font-medium hover:text-coral transition-colors duration-200 uppercase text-sm tracking-wide">Categories</a>
                    <a href="#sellers" class="text-white font-medium hover:text-coral transition-colors duration-200 uppercase text-sm tracking-wide">Sellers</a>
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

    <!-- Hero Banner -->
    <section class="bg-gradient-to-br from-sage via-neutral-100 to-neutral-50 border-b-4 border-neutral-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-20 w-64 h-64 bg-coral rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-sage rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-[1600px] mx-auto px-6 lg:px-8 py-20 lg:py-28 relative">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8 animate-fade-in-up">
                    <div class="inline-block bg-coral text-white px-4 py-1.5 border-3 border-neutral-900 shadow-brutal rotate-[-2deg] font-bold uppercase text-xs tracking-wider">
                        New Releases Weekly
                    </div>
                    <h1 class="text-6xl lg:text-7xl font-black font-display leading-[0.95] tracking-tight">
                        Books for <span class="text-coral italic">everyone.</span><br/>
                        Stories for <span class="bg-sage px-3 py-1 inline-block rotate-[-1deg]">you.</span>
                    </h1>
                    <p class="text-xl text-neutral-700 leading-relaxed max-w-xl">
                        Discover curated collections from independent sellers, rare finds, bestsellers, and hidden gems. Your next favorite book is waiting.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('books.index') }}" class="bg-neutral-900 text-white px-8 py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide inline-block">
                            Start Shopping
                        </a>
                        <a href="#sellers" class="bg-white text-neutral-900 px-8 py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide inline-block">
                            Become a Seller
                        </a>
                    </div>
                    <div class="flex items-center gap-8 pt-4">
                        <div>
                            <div class="text-3xl font-black font-display text-coral">10K+</div>
                            <div class="text-sm text-neutral-600 uppercase tracking-wide">Books Listed</div>
                        </div>
                        <div class="w-px h-12 bg-neutral-300"></div>
                        <div>
                            <div class="text-3xl font-black font-display text-coral">500+</div>
                            <div class="text-sm text-neutral-600 uppercase tracking-wide">Verified Sellers</div>
                        </div>
                        <div class="w-px h-12 bg-neutral-300"></div>
                        <div>
                            <div class="text-3xl font-black font-display text-coral">50K+</div>
                            <div class="text-sm text-neutral-600 uppercase tracking-wide">Happy Readers</div>
                        </div>
                    </div>
                </div>

                <!-- Featured Book Cards Stack -->
                <div class="relative h-[500px] hidden lg:block animate-fade-in-right">
                    @foreach($newArrivals->take(3) as $index => $book)
                    <div class="absolute bg-white border-4 border-neutral-900 shadow-brutal p-6 w-72 hover:-translate-y-2 transition-transform duration-300 cursor-pointer"
                         style="top: {{ $index * 60 }}px; left: {{ $index * 40 }}px; transform: rotate({{ ($index - 1) * 3 }}deg); z-index: {{ 3 - $index }};">
                        <div class="h-80 bg-gradient-to-br from-coral to-neutral-800 border-3 border-neutral-900 mb-4 flex items-center justify-center text-white font-display font-bold text-xl text-center p-4">
                            {{ $book->title ?? 'Featured Book' }}
                        </div>
                        <h3 class="font-display font-bold text-lg mb-1 line-clamp-2">{{ $book->title ?? 'Book Title' }}</h3>
                        <p class="text-neutral-600 text-sm">{{ $book->author ?? 'Author Name' }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="font-bold text-lg text-coral">${{ $book->price ?? '24.99' }}</span>
                            <span class="text-xs text-neutral-500 uppercase tracking-wide">{{ $book->pages ?? '320' }} pages</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Categories Bar -->
    <section class="bg-neutral-900 border-b-4 border-coral">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-8 py-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($categories as $category)
                <a href="{{ route('books.index', ['category' => $category->slug]) }}" class="group bg-neutral-800 border-3 border-neutral-700 hover:border-coral p-6 text-center transition-all duration-200 hover:-translate-y-1">
                    <div class="text-4xl mb-3">📚</div>
                    <div class="text-white font-bold text-sm uppercase tracking-wide group-hover:text-coral transition-colors">
                        {{ $category->name ?? 'Category' }}
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Books Grid -->
    <section id="browse" class="py-20 bg-white">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex items-end justify-between mb-12 pb-6 border-b-4 border-neutral-900">
                <div>
                    <h2 class="text-5xl lg:text-6xl font-black font-display mb-2 tracking-tight">Featured Books</h2>
                    <p class="text-neutral-600 text-lg">Handpicked selections from our marketplace</p>
                </div>
                <a href="{{ route('books.index') }}" class="hidden md:flex items-center gap-2 text-coral font-bold uppercase text-sm tracking-wide hover:gap-4 transition-all group">
                    View All
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <!-- Books Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredBooks as $index => $book)
                <div class="group cursor-pointer animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                    <!-- Book Cover -->
                    <div class="relative bg-gradient-to-br from-neutral-700 to-neutral-900 aspect-[3/4] border-4 border-neutral-900 shadow-brutal mb-4 overflow-hidden group-hover:-translate-y-2 transition-all duration-300">
                        <!-- Placeholder for book cover image -->
                        <div class="absolute inset-0 flex items-center justify-center text-white font-display font-bold text-2xl text-center p-6 bg-gradient-to-br {{ ['from-coral to-red-600', 'from-sage to-green-700', 'from-amber-500 to-orange-600', 'from-blue-500 to-indigo-700'][$index % 4] }}">
                            {{ $book->title ?? 'Book Title' }}
                        </div>

                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-neutral-900/90 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <button class="bg-coral text-white px-6 py-3 border-3 border-white shadow-brutal-sm font-bold uppercase text-sm tracking-wide hover:scale-105 transition-transform">
                                Quick View
                            </button>
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
                            <span class="text-neutral-300">•</span>
                            <span class="text-xs text-coral font-bold uppercase tracking-wide">{{ $book->country ?? 'USA' }}</span>
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

            <!-- Load More -->
            <div class="text-center mt-16">
                <a href="{{ route('books.index') }}" class="inline-block bg-white text-neutral-900 px-12 py-4 border-4 border-neutral-900 shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                    View All Books
                </a>
            </div>
        </div>
    </section>

    <!-- New Arrivals Diagonal Section -->
    <section id="new-arrivals" class="bg-neutral-900 py-20 relative overflow-hidden border-y-4 border-coral">
        <!-- Diagonal Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-32 bg-coral transform -skew-y-3"></div>
            <div class="absolute bottom-0 right-0 w-full h-32 bg-sage transform skew-y-3"></div>
        </div>

        <div class="max-w-[1600px] mx-auto px-6 lg:px-8 relative z-10">
            <div class="flex items-end justify-between mb-12 pb-6 border-b-4 border-coral">
                <div>
                    <div class="inline-block bg-coral text-white px-4 py-1.5 border-3 border-white shadow-brutal rotate-[-2deg] font-bold uppercase text-xs tracking-wider mb-4">
                        Fresh This Week
                    </div>
                    <h2 class="text-5xl lg:text-6xl font-black font-display text-white mb-2 tracking-tight">New Arrivals</h2>
                    <p class="text-neutral-400 text-lg">Just added to our marketplace</p>
                </div>
            </div>

            <!-- Horizontal Scroll Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($newArrivals as $index => $book)
                <div class="bg-neutral-800 border-3 border-neutral-700 hover:border-coral p-6 group cursor-pointer transition-all duration-300 hover:-translate-y-2">
                    <div class="flex gap-4">
                        <div class="w-24 h-32 bg-gradient-to-br {{ ['from-coral to-red-600', 'from-sage to-green-700', 'from-amber-500 to-orange-600', 'from-blue-500 to-indigo-700'][$index % 4] }} border-3 border-neutral-900 flex-shrink-0"></div>
                        <div class="flex-1 flex flex-col">
                            <h3 class="font-display font-bold text-white mb-1 line-clamp-2 group-hover:text-coral transition-colors">
                                {{ $book->title ?? 'Book Title' }}
                            </h3>
                            <p class="text-neutral-400 text-sm mb-2">{{ $book->author ?? 'Author Name' }}</p>
                            <div class="mt-auto">
                                <div class="flex items-center justify-between">
                                    <span class="font-black text-xl text-coral">${{ $book->price ?? '24.99' }}</span>
                                    <span class="text-xs text-neutral-500 uppercase">New</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="w-full bg-coral text-white py-2.5 border-3 border-neutral-900 shadow-brutal-sm font-bold uppercase text-xs tracking-wide mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        Add to Cart
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-20 bg-gradient-to-br from-neutral-50 to-sage/20">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl lg:text-6xl font-black font-display mb-4 tracking-tight">Browse by Genre</h2>
                <p class="text-neutral-600 text-lg max-w-2xl mx-auto">Find your next favorite book in our carefully organized categories</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @foreach($categories as $category)
                <a href="{{ route('books.index', ['category' => $category]) }}" class="group bg-white border-4 border-neutral-900 shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none hover:bg-coral transition-all duration-200 p-8 text-center">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">📖</div>
                    <h3 class="font-display font-bold text-lg mb-1 group-hover:text-white transition-colors">{{ $category->name ?? 'Category' }}</h3>
                    <p class="text-neutral-500 text-sm group-hover:text-white/80 transition-colors">120+ books</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Seller CTA Section -->
    <section class="bg-coral border-y-4 border-neutral-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-neutral-900 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-[1600px] mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div class="inline-block bg-neutral-900 text-white px-4 py-1.5 border-3 border-white shadow-brutal rotate-[-2deg] font-bold uppercase text-xs tracking-wider">
                        Start Earning Today
                    </div>
                    <h2 class="text-5xl lg:text-6xl font-black font-display text-white leading-tight tracking-tight">
                        Sell Your Books on Bookoo
                    </h2>
                    <p class="text-white/90 text-xl leading-relaxed">
                        Join hundreds of sellers reaching thousands of book lovers. List your books, set your prices, and start earning. Zero setup fees, simple process.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="#" class="bg-neutral-900 text-white px-8 py-4 border-3 border-white shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide inline-block">
                            Start Selling
                        </a>
                        <a href="#" class="bg-white text-neutral-900 px-8 py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide inline-block">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white/10 backdrop-blur-sm border-3 border-white/20 p-6 text-white">
                        <div class="text-4xl font-black font-display mb-2">0%</div>
                        <div class="text-sm uppercase tracking-wide">Setup Fees</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border-3 border-white/20 p-6 text-white">
                        <div class="text-4xl font-black font-display mb-2">500+</div>
                        <div class="text-sm uppercase tracking-wide">Active Sellers</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border-3 border-white/20 p-6 text-white">
                        <div class="text-4xl font-black font-display mb-2">24h</div>
                        <div class="text-sm uppercase tracking-wide">Avg. First Sale</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border-3 border-white/20 p-6 text-white">
                        <div class="text-4xl font-black font-display mb-2">95%</div>
                        <div class="text-sm uppercase tracking-wide">Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="bg-neutral-900 py-20">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-4xl lg:text-5xl font-black font-display text-white mb-4 tracking-tight">Stay in the Loop</h2>
            <p class="text-neutral-400 text-lg mb-8">Get weekly book recommendations, exclusive deals, and new arrival alerts.</p>

            <form class="flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto">
                <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-4 border-3 border-neutral-700 bg-neutral-800 text-white placeholder-neutral-500 focus:outline-none focus:border-coral transition-colors font-medium">
                <button type="submit" class="bg-coral text-white px-8 py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide whitespace-nowrap">
                    Subscribe Now
                </button>
            </form>
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

    <style>
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-fade-in-right {
            animation: fadeInRight 1s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</body>
</html>
