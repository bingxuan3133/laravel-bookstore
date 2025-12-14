<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Seller Dashboard') - Bookoo Seller Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-50 font-body text-neutral-900">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-72 bg-gradient-to-b from-sage to-green-700 border-r-4 border-neutral-900 flex flex-col overflow-hidden">
            <!-- Brand -->
            <div class="p-6 border-b-3 border-green-800 bg-green-800/30">
                <a href="{{ route('seller.dashboard') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-white border-3 border-neutral-900 rotate-3 group-hover:rotate-12 transition-transform duration-300 flex items-center justify-center">
                        <svg class="w-7 h-7 text-sage" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-2xl font-bold font-display text-white tracking-tight block">Bookoo</span>
                        <span class="text-xs text-neutral-900 font-bold uppercase tracking-wider">Seller Portal</span>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                <a href="{{ route('seller.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/10 border-3 border-transparent hover:border-white/30 transition-all duration-200 font-medium {{ request()->routeIs('seller.dashboard') ? 'bg-white/20 border-white/50' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('seller.books.index') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/10 border-3 border-transparent hover:border-white/30 transition-all duration-200 font-medium {{ request()->routeIs('seller.books.*') ? 'bg-white/20 border-white/50' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span>My Books</span>
                </a>

                <a href="{{ route('seller.orders.index') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/10 border-3 border-transparent hover:border-white/30 transition-all duration-200 font-medium {{ request()->routeIs('seller.orders.*') ? 'bg-white/20 border-white/50' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                    <span>Orders</span>
                </a>

                <div class="my-4 border-t-2 border-white/20"></div>

                <a href="{{ route('seller.store.settings') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/10 border-3 border-transparent hover:border-white/30 transition-all duration-200 font-medium {{ request()->routeIs('seller.store.settings') ? 'bg-white/20 border-white/50' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Store Settings</span>
                </a>

                <a href="{{ route('seller.help') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-white/10 border-3 border-transparent hover:border-white/30 transition-all duration-200 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Help & Support</span>
                </a>
            </nav>

            <!-- Seller Profile -->
            <div class="p-4 border-t-3 border-green-800 bg-green-800/30">
                <div class="flex items-center gap-3 px-4 py-3 bg-white/10 border-3 border-white/30">
                    <div class="w-10 h-10 bg-white border-2 border-neutral-900 rounded-full flex items-center justify-center">
                        <span class="text-sage font-bold text-sm">BH</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-bold text-sm truncate">Book Haven Store</p>
                        <p class="text-white/70 text-xs truncate flex items-center gap-1">
                            <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                            Active
                        </p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white/70 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white border-b-4 border-neutral-900 shadow-brutal-sm">
                <div class="px-8 py-4 flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold font-display tracking-tight">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-neutral-600 text-sm mt-1">@yield('page-description', 'Manage your bookstore')</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-neutral-600 hover:text-sage transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-coral rounded-full"></span>
                        </button>

                        <!-- Add Book Button -->
                        <a href="{{ route('seller.books.create') }}" class="px-4 py-2 bg-sage text-neutral-900 border-3 border-neutral-900 hover:translate-x-0.5 hover:translate-y-0.5 shadow-brutal hover:shadow-none transition-all font-bold text-sm uppercase tracking-wide">
                            + Add Book
                        </a>

                        <!-- View Storefront -->
                        <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 bg-white text-neutral-900 border-3 border-neutral-900 hover:bg-neutral-100 transition-colors font-bold text-sm uppercase tracking-wide">
                            View Store
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-8 bg-neutral-50">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
