<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') - Bookoo Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-50 font-body text-neutral-900">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-72 bg-neutral-900 border-r-4 border-coral flex flex-col overflow-hidden">
            <!-- Brand -->
            <div class="p-6 border-b-3 border-neutral-800 bg-neutral-950">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-coral border-3 border-white rotate-3 group-hover:rotate-12 transition-transform duration-300 flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 10h7c-.53 4.12-3.28 7.79-7 8.94V12H5V9h7V4.06l7 3.5V12z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-2xl font-bold font-display text-white tracking-tight block">Bookoo</span>
                        <span class="text-xs text-coral font-bold uppercase tracking-wider">Admin Portal</span>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-neutral-800 border-3 border-transparent hover:border-coral transition-all duration-200 font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-coral border-coral' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.books.index') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-neutral-800 border-3 border-transparent hover:border-coral transition-all duration-200 font-medium {{ request()->routeIs('admin.books.*') ? 'bg-coral border-coral' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span>Books</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-neutral-800 border-3 border-transparent hover:border-coral transition-all duration-200 font-medium {{ request()->routeIs('admin.categories.*') ? 'bg-coral border-coral' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    <span>Categories</span>
                </a>

                <a href="{{ route('admin.sellers.index') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-neutral-800 border-3 border-transparent hover:border-coral transition-all duration-200 font-medium {{ request()->routeIs('admin.sellers.*') ? 'bg-coral border-coral' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span>Sellers</span>
                </a>

                {{-- <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-neutral-800 border-3 border-transparent hover:border-coral transition-all duration-200 font-medium {{ request()->routeIs('admin.users.*') ? 'bg-coral border-coral' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span>Users</span>
                </a> --}}

                <div class="my-4 border-t-2 border-neutral-800"></div>

                <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-4 py-3 text-white hover:bg-neutral-800 border-3 border-transparent hover:border-coral transition-all duration-200 font-medium {{ request()->routeIs('admin.settings') ? 'bg-coral border-coral' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Settings</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t-3 border-neutral-800 bg-neutral-950">
                <div class="flex items-center gap-3 px-4 py-3 bg-neutral-800 border-3 border-neutral-700">
                    <div class="w-10 h-10 bg-coral border-2 border-white rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-sm">AD</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-bold text-sm truncate">Admin User</p>
                        <p class="text-neutral-400 text-xs truncate">admin@bookoo.com</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-neutral-400 hover:text-coral transition-colors">
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
                        <p class="text-neutral-600 text-sm mt-1">@yield('page-description', 'Welcome back, Admin')</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-neutral-600 hover:text-coral transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-coral rounded-full"></span>
                        </button>

                        <!-- View Site -->
                        <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 bg-neutral-900 text-white border-3 border-neutral-900 hover:bg-coral hover:border-coral transition-colors font-bold text-sm uppercase tracking-wide">
                            View Site
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
