<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Bookoo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-900 font-body text-neutral-900 min-h-screen flex items-center justify-center p-6">
    <!-- Background Pattern -->
    <div class="fixed inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.1) 35px, rgba(255,255,255,.1) 70px);"></div>
    </div>

    <div class="relative w-full max-w-md">
        <!-- Logo/Brand -->
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group mb-4">
                <div class="w-16 h-16 bg-coral border-4 border-white rotate-3 group-hover:rotate-12 transition-transform duration-300 flex items-center justify-center shadow-brutal">
                    <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 2.05v3.03c3.39.49 6 3.39 6 6.92 0 .9-.18 1.75-.48 2.54l2.6 1.53c.56-1.24.88-2.62.88-4.07 0-5.18-3.95-9.45-9-9.95zM12 19c-3.87 0-7-3.13-7-7 0-3.53 2.61-6.43 6-6.92V2.05c-5.06.5-9 4.76-9 9.95 0 5.52 4.47 10 9.99 10 3.31 0 6.24-1.61 8.06-4.09l-2.6-1.53C16.17 17.98 14.21 19 12 19z"/>
                    </svg>
                </div>
                <span class="text-5xl font-black font-display text-white tracking-tight">Bookoo</span>
            </a>
            <p class="text-neutral-400 font-medium">Sign in to your account</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white border-4 border-white shadow-brutal">
            <div class="bg-gradient-to-br from-coral to-red-600 border-b-4 border-neutral-900 p-6">
                <h1 class="text-3xl font-black font-display text-white uppercase tracking-tight">Login</h1>
                <p class="text-white/80 text-sm mt-1">Admin & Seller Portal</p>
            </div>

            <div class="p-8">
                @if (session('message'))
                    <div class="mb-6 bg-amber-50 border-3 border-amber-500 p-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div class="flex-1">
                                <p class="font-bold text-amber-900 text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-3 border-red-600 p-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div class="flex-1">
                                <p class="font-bold text-red-900 text-sm mb-1">Login Failed</p>
                                @foreach ($errors->all() as $error)
                                    <p class="text-red-700 text-sm">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-bold uppercase tracking-wide text-neutral-900 mb-2">
                            Email Address
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:border-coral transition-colors font-medium text-neutral-900 placeholder-neutral-400"
                            placeholder="your.email@example.com"
                        >
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-bold uppercase tracking-wide text-neutral-900 mb-2">
                            Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:border-coral transition-colors font-medium text-neutral-900 placeholder-neutral-400"
                            placeholder="••••••••"
                        >
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                class="w-5 h-5 border-3 border-neutral-900 text-coral focus:ring-0 focus:ring-offset-0 cursor-pointer"
                            >
                            <span class="text-sm font-medium text-neutral-700 group-hover:text-coral transition-colors">
                                Remember me
                            </span>
                        </label>

                        <a href="#" class="text-sm font-bold text-coral hover:text-neutral-900 transition-colors uppercase tracking-wide">
                            Forgot Password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-coral text-white py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all duration-200 font-black uppercase text-sm tracking-wide"
                    >
                        Sign In
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="border-t-3 border-neutral-900 bg-neutral-50 p-6 text-center">
                <p class="text-sm text-neutral-600">
                    Don't have an account?
                    <a href="{{ route('home') }}" class="font-bold text-coral hover:text-neutral-900 transition-colors uppercase tracking-wide">
                        Contact Admin
                    </a>
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-white hover:text-coral transition-colors font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Bookoo
            </a>
        </div>
    </div>
</body>
</html>
