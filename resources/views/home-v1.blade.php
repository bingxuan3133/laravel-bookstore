<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Online Bookstore</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <h1 class="text-2xl font-semibold text-gray-900">Bookoo</h1>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-gray-700 hover:text-indigo-600">Home</a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600">Categories</a>
                    <a href="#" class="text-gray-700 hover:text-indigo-600">About</a>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Cart (0)
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Discover Your Next Great Read</h2>
            <p class="text-xl mb-8 text-indigo-100">Browse thousands of books across all genres</p>
            <div class="max-w-2xl mx-auto">
                <div class="flex gap-2">
                    <input
                        type="text"
                        placeholder="Search for books, authors, or ISBN..."
                        class="flex-1 px-6 py-3 rounded-lg text-gray-900 placeholder:text-gray-400 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-transparent"
                    >
                    <button class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h3 class="text-3xl font-bold text-gray-900 mb-8">Featured Books</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Book Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <div class="bg-gradient-to-br from-blue-400 to-blue-600 h-64 flex items-center justify-center">
                    <svg class="w-24 h-24 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-lg text-gray-900 mb-2">The Great Novel</h4>
                    <p class="text-gray-600 text-sm mb-2">by John Author</p>
                    <p class="text-gray-500 text-sm mb-4">A captivating story of adventure and discovery...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-indigo-600">$19.99</span>
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Book Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <div class="bg-gradient-to-br from-purple-400 to-purple-600 h-64 flex items-center justify-center">
                    <svg class="w-24 h-24 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-lg text-gray-900 mb-2">Mystery Tales</h4>
                    <p class="text-gray-600 text-sm mb-2">by Jane Writer</p>
                    <p class="text-gray-500 text-sm mb-4">Unravel the secrets hidden in the shadows...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-indigo-600">$24.99</span>
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Book Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <div class="bg-gradient-to-br from-green-400 to-green-600 h-64 flex items-center justify-center">
                    <svg class="w-24 h-24 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-lg text-gray-900 mb-2">Science Fiction</h4>
                    <p class="text-gray-600 text-sm mb-2">by Alex Scribe</p>
                    <p class="text-gray-500 text-sm mb-4">Journey to the stars and beyond imagination...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-indigo-600">$22.99</span>
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Book Card 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <div class="bg-gradient-to-br from-orange-400 to-orange-600 h-64 flex items-center justify-center">
                    <svg class="w-24 h-24 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-lg text-gray-900 mb-2">Historical Romance</h4>
                    <p class="text-gray-600 text-sm mb-2">by Emma Pages</p>
                    <p class="text-gray-500 text-sm mb-4">A timeless love story set in the Victorian era...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold text-indigo-600">$18.99</span>
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-3xl font-bold text-gray-900 mb-8">Browse by Category</h3>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <a href="#" class="bg-white p-6 rounded-lg text-center hover:shadow-lg transition">
                    <div class="text-4xl mb-2">📚</div>
                    <h4 class="font-semibold text-gray-900">Fiction</h4>
                </a>
                <a href="#" class="bg-white p-6 rounded-lg text-center hover:shadow-lg transition">
                    <div class="text-4xl mb-2">🔬</div>
                    <h4 class="font-semibold text-gray-900">Science</h4>
                </a>
                <a href="#" class="bg-white p-6 rounded-lg text-center hover:shadow-lg transition">
                    <div class="text-4xl mb-2">📖</div>
                    <h4 class="font-semibold text-gray-900">Biography</h4>
                </a>
                <a href="#" class="bg-white p-6 rounded-lg text-center hover:shadow-lg transition">
                    <div class="text-4xl mb-2">🎨</div>
                    <h4 class="font-semibold text-gray-900">Art</h4>
                </a>
                <a href="#" class="bg-white p-6 rounded-lg text-center hover:shadow-lg transition">
                    <div class="text-4xl mb-2">👶</div>
                    <h4 class="font-semibold text-gray-900">Children</h4>
                </a>
                <a href="#" class="bg-white p-6 rounded-lg text-center hover:shadow-lg transition">
                    <div class="text-4xl mb-2">💼</div>
                    <h4 class="font-semibold text-gray-900">Business</h4>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h5 class="font-semibold text-lg mb-4">About Us</h5>
                    <p class="text-gray-400 text-sm">Your trusted online bookstore with thousands of titles across all genres.</p>
                </div>
                <div>
                    <h5 class="font-semibold text-lg mb-4">Quick Links</h5>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Home</a></li>
                        <li><a href="#" class="hover:text-white">All Books</a></li>
                        <li><a href="#" class="hover:text-white">New Releases</a></li>
                        <li><a href="#" class="hover:text-white">Best Sellers</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-lg mb-4">Customer Service</h5>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-white">Returns</a></li>
                        <li><a href="#" class="hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-lg mb-4">Newsletter</h5>
                    <p class="text-gray-400 text-sm mb-4">Subscribe to get updates on new releases</p>
                    <div class="flex gap-2">
                        <input
                            type="email"
                            placeholder="Your email"
                            class="flex-1 px-4 py-2 rounded-lg text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        >
                        <button class="bg-indigo-600 px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2025 Bookstore. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
