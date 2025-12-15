<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bookoo')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-900 text-neutral-900 font-body">
    <!-- Background Pattern -->
    <div class="fixed inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.1) 35px, rgba(255,255,255,.1) 70px);"></div>
    </div>

    <!-- Main Content -->
    <div class="relative min-h-screen flex flex-col">
        <!-- Logo/Brand -->
        <div class="pt-8 pb-4 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group">
                <div class="w-16 h-16 bg-coral border-4 border-white rotate-3 group-hover:rotate-12 transition-transform duration-300 flex items-center justify-center shadow-brutal">
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 2.05v3.03c3.39.49 6 3.39 6 6.92 0 .9-.18 1.75-.48 2.54l2.6 1.53c.56-1.24.88-2.62.88-4.07 0-5.18-3.95-9.45-9-9.95zM12 19c-3.87 0-7-3.13-7-7 0-3.53 2.61-6.43 6-6.92V2.05c-5.06.5-9 4.76-9 9.95 0 5.52 4.47 10 9.99 10 3.31 0 6.24-1.61 8.06-4.09l-2.6-1.53C16.17 17.98 14.21 19 12 19z"/>
                    </svg>
                </div>
                <span class="text-5xl font-black font-display text-white tracking-tight">Bookoo</span>
            </a>
        </div>

        <!-- Page Content -->
        <div class="flex-1 flex items-center justify-center px-6 py-12">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="py-6 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-white hover:text-coral transition-colors font-medium text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Bookoo
            </a>
            <p class="text-neutral-500 text-xs mt-4">© 2025 Bookoo. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
