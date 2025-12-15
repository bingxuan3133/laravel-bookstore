@extends('layouts.auth')

@section('title', 'Register - Bookoo')

@section('content')
    <div class="w-full max-w-2xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-5xl font-black font-display mb-3 tracking-tight text-white">Join Bookoo</h1>
            <p class="text-neutral-400 text-lg">Create your account to start buying or selling books</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white border-4 border-neutral-900 shadow-brutal p-8">
            @if ($errors->any())
            <div class="bg-red-50 border-3 border-red-500 p-4 mb-6">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="font-bold text-red-900 text-sm mb-1">Registration Failed</p>
                        @foreach ($errors->all() as $error)
                        <p class="text-red-700 text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-bold text-neutral-900 mb-2 uppercase tracking-wide">
                        Full Name
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:border-coral transition-all @error('name') border-red-500 @enderror"
                        placeholder="John Doe"
                    >
                    @error('name')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-bold text-neutral-900 mb-2 uppercase tracking-wide">
                        Email Address
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:border-coral transition-all @error('email') border-red-500 @enderror"
                        placeholder="you@example.com"
                    >
                    @error('email')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-bold text-neutral-900 mb-2 uppercase tracking-wide">
                            Password
                        </label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:border-coral transition-all @error('password') border-red-500 @enderror"
                            placeholder="Min. 8 characters"
                        >
                        @error('password')
                        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-bold text-neutral-900 mb-2 uppercase tracking-wide">
                            Confirm Password
                        </label>
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:border-coral transition-all"
                            placeholder="Re-enter password"
                        >
                    </div>
                </div>

                <!-- Account Type -->
                <div>
                    <label class="block text-sm font-bold text-neutral-900 mb-3 uppercase tracking-wide">
                        I want to
                    </label>
                    <div class="grid md:grid-cols-2 gap-4">
                        <label class="relative cursor-pointer">
                            <input
                                type="radio"
                                name="role"
                                value="buyer"
                                class="peer sr-only"
                                {{ old('role', request('as') === 'seller' ? 'seller' : 'buyer') === 'buyer' ? 'checked' : '' }}
                            >
                            <div class="border-3 border-neutral-900 p-6 peer-checked:border-coral peer-checked:bg-coral/5 transition-all hover:border-coral/50">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 w-8 h-8 bg-sage border-2 border-neutral-900 flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-bold text-lg mb-1">Buy Books</h3>
                                        <p class="text-sm text-neutral-600">Browse and purchase books from verified sellers</p>
                                    </div>
                                </div>
                            </div>
                        </label>

                        <label class="relative cursor-pointer">
                            <input
                                type="radio"
                                name="role"
                                value="seller"
                                class="peer sr-only"
                                {{ old('role', request('as') === 'seller' ? 'seller' : 'buyer') === 'seller' ? 'checked' : '' }}
                            >
                            <div class="border-3 border-neutral-900 p-6 peer-checked:border-coral peer-checked:bg-coral/5 transition-all hover:border-coral/50">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 w-8 h-8 bg-coral border-2 border-neutral-900 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-bold text-lg mb-1">Sell Books</h3>
                                        <p class="text-sm text-neutral-600">List your books and start earning today</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    @error('role')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Seller Information (shown only when seller is selected) -->
                <div id="seller-info" class="space-y-6 hidden">
                    <div class="bg-sage/20 border-3 border-sage p-6">
                        <h3 class="font-bold text-lg mb-4 uppercase tracking-wide">Seller Information</h3>

                        <div class="space-y-4">
                            <!-- Store Name -->
                            <div>
                                <label for="store_name" class="block text-sm font-bold text-neutral-900 mb-2 uppercase tracking-wide">
                                    Store Name
                                </label>
                                <input
                                    id="store_name"
                                    type="text"
                                    name="store_name"
                                    value="{{ old('store_name') }}"
                                    class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:border-coral transition-all @error('store_name') border-red-500 @enderror"
                                    placeholder="Your Store Name"
                                >
                                @error('store_name')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Store Description -->
                            <div>
                                <label for="store_description" class="block text-sm font-bold text-neutral-900 mb-2 uppercase tracking-wide">
                                    Store Description
                                </label>
                                <textarea
                                    id="store_description"
                                    name="store_description"
                                    rows="3"
                                    class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:border-coral transition-all @error('store_description') border-red-500 @enderror"
                                    placeholder="Tell buyers about your store..."
                                >{{ old('store_description') }}</textarea>
                                @error('store_description')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div>
                    <label class="flex items-start gap-3">
                        <input
                            type="checkbox"
                            name="terms"
                            required
                            class="mt-1 w-4 h-4 border-2 border-neutral-900 text-coral focus:ring-coral focus:ring-offset-0"
                        >
                        <span class="text-sm text-neutral-700">
                            I agree to the
                            <a href="#" class="text-coral hover:text-neutral-900 font-bold transition-colors">Terms of Service</a>
                            and
                            <a href="#" class="text-coral hover:text-neutral-900 font-bold transition-colors">Privacy Policy</a>
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-coral text-white py-4 border-3 border-neutral-900 shadow-brutal hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide"
                >
                    Create Account
                </button>
            </form>
        </div>

        <!-- Login Link -->
        <div class="mt-6 text-center">
            <p class="text-neutral-400">
                Already have an account?
                <a href="{{ route('login') }}" class="text-coral hover:text-white font-bold uppercase text-sm tracking-wide transition-colors">
                    Sign In
                </a>
            </p>
        </div>

        <!-- Social Login (Optional) -->
        <div class="mt-8">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t-2 border-neutral-700"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-neutral-900 text-neutral-500 font-bold uppercase tracking-wide">
                        Or sign up with
                    </span>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-2 gap-4">
                <button class="bg-white border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 py-3 px-4 flex items-center justify-center gap-2 font-bold text-sm">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Google
                </button>
                <button class="bg-white border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 py-3 px-4 flex items-center justify-center gap-2 font-bold text-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.17 6.839 9.49.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.167 22 16.418 22 12c0-5.523-4.477-10-10-10z"/>
                    </svg>
                    GitHub
                </button>
            </div>
        </div>
    </div>

    <script>
        // Show/hide seller information based on role selection
        document.addEventListener('DOMContentLoaded', function() {
            const roleInputs = document.querySelectorAll('input[name="role"]');
            const sellerInfo = document.getElementById('seller-info');
            const storeNameInput = document.getElementById('store_name');
            const storeDescInput = document.getElementById('store_description');

            function toggleSellerInfo() {
                const selectedRole = document.querySelector('input[name="role"]:checked').value;
                if (selectedRole === 'seller') {
                    sellerInfo.classList.remove('hidden');
                    storeNameInput.setAttribute('required', 'required');
                    storeDescInput.setAttribute('required', 'required');
                } else {
                    sellerInfo.classList.add('hidden');
                    storeNameInput.removeAttribute('required');
                    storeDescInput.removeAttribute('required');
                }
            }

            roleInputs.forEach(input => {
                input.addEventListener('change', toggleSellerInfo);
            });

            // Initialize on page load
            toggleSellerInfo();
        });
    </script>
@endsection
