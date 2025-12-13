@extends('layouts.seller')

@section('title', 'Seller Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Overview of your store performance')

@section('content')
<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Listed Books -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal p-6 hover:-translate-y-1 transition-transform duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-sage border-3 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <span class="text-xs font-bold uppercase tracking-wide text-sage px-2 py-1 bg-sage/20 border-2 border-sage">Books</span>
        </div>
        <h3 class="text-4xl font-black font-display mb-2">47</h3>
        <p class="text-neutral-600 text-sm font-medium">Listed Books</p>
        <div class="mt-4 flex items-center text-xs">
            <span class="text-green-600 font-bold">+3</span>
            <span class="text-neutral-500 ml-2">this week</span>
        </div>
    </div>

    <!-- Total Sales -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal p-6 hover:-translate-y-1 transition-transform duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-coral border-3 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <span class="text-xs font-bold uppercase tracking-wide text-coral px-2 py-1 bg-coral/20 border-2 border-coral">Sales</span>
        </div>
        <h3 class="text-4xl font-black font-display mb-2">234</h3>
        <p class="text-neutral-600 text-sm font-medium">Total Sales</p>
        <div class="mt-4 flex items-center text-xs">
            <span class="text-green-600 font-bold">+18</span>
            <span class="text-neutral-500 ml-2">vs last month</span>
        </div>
    </div>

    <!-- Revenue -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal p-6 hover:-translate-y-1 transition-transform duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-amber-400 border-3 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-xs font-bold uppercase tracking-wide text-amber-600 px-2 py-1 bg-amber-100 border-2 border-amber-400">Revenue</span>
        </div>
        <h3 class="text-4xl font-black font-display mb-2">$5,842</h3>
        <p class="text-neutral-600 text-sm font-medium">Total Revenue</p>
        <div class="mt-4 flex items-center text-xs">
            <span class="text-green-600 font-bold">+$432</span>
            <span class="text-neutral-500 ml-2">vs last month</span>
        </div>
    </div>

    <!-- Pending Orders -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal p-6 hover:-translate-y-1 transition-transform duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-400 border-3 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            <span class="text-xs font-bold uppercase tracking-wide text-blue-600 px-2 py-1 bg-blue-100 border-2 border-blue-400">Orders</span>
        </div>
        <h3 class="text-4xl font-black font-display mb-2">12</h3>
        <p class="text-neutral-600 text-sm font-medium">Pending Orders</p>
        <div class="mt-4">
            <a href="{{ route('seller.orders.index') }}" class="text-xs text-blue-600 font-bold hover:text-neutral-900">View Orders →</a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Orders -->
    <div class="lg:col-span-2">
        <div class="bg-white border-4 border-neutral-900 shadow-brutal">
            <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50 flex items-center justify-between">
                <h2 class="text-xl font-bold font-display uppercase tracking-wide">Recent Orders</h2>
                <a href="{{ route('seller.orders.index') }}" class="text-sm text-sage hover:text-neutral-900 font-bold uppercase tracking-wide">View All →</a>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @for($i = 0; $i < 5; $i++)
                    <div class="flex items-center gap-4 pb-4 border-b-2 border-neutral-100 last:border-0">
                        <div class="w-16 h-20 bg-gradient-to-br from-sage to-green-700 border-3 border-neutral-900 flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-neutral-900 truncate">1984 by George Orwell</h3>
                            <p class="text-sm text-neutral-600">Order #10{{ $i + 23 }}</p>
                            <p class="text-xs text-neutral-500 mt-1">Ordered {{ $i + 1 }} hours ago</p>
                        </div>
                        <div class="text-right">
                            <p class="font-black text-lg text-sage">$24.99</p>
                            <span class="inline-block mt-1 px-2 py-1 text-xs font-bold uppercase tracking-wide {{ $i % 2 == 0 ? 'bg-amber-100 text-amber-700 border-2 border-amber-400' : 'bg-green-100 text-green-700 border-2 border-green-400' }}">
                                {{ $i % 2 == 0 ? 'Pending' : 'Shipped' }}
                            </span>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <!-- Performance & Quick Actions -->
    <div class="space-y-6">
        <!-- Store Performance -->
        <div class="bg-white border-4 border-neutral-900 shadow-brutal">
            <div class="px-6 py-4 border-b-3 border-neutral-900 bg-sage/20">
                <h2 class="text-xl font-bold font-display uppercase tracking-wide">This Month</h2>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-neutral-600">Books Sold</span>
                    <span class="text-lg font-black">67</span>
                </div>
                <div class="w-full bg-neutral-100 border-2 border-neutral-900 h-3">
                    <div class="bg-sage border-r-2 border-neutral-900 h-full" style="width: 67%"></div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <span class="text-sm font-medium text-neutral-600">Revenue</span>
                    <span class="text-lg font-black">$1,892</span>
                </div>
                <div class="w-full bg-neutral-100 border-2 border-neutral-900 h-3">
                    <div class="bg-coral border-r-2 border-neutral-900 h-full" style="width: 75%"></div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <span class="text-sm font-medium text-neutral-600">Views</span>
                    <span class="text-lg font-black">2,341</span>
                </div>
                <div class="w-full bg-neutral-100 border-2 border-neutral-900 h-3">
                    <div class="bg-amber-400 border-r-2 border-neutral-900 h-full" style="width: 89%"></div>
                </div>

                <div class="mt-6 pt-4 border-t-2 border-neutral-200">
                    <a href="{{ route('seller.analytics') }}" class="block text-center text-sm text-sage hover:text-neutral-900 font-bold uppercase tracking-wide">
                        View Full Analytics →
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white border-4 border-neutral-900 shadow-brutal">
            <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50">
                <h2 class="text-xl font-bold font-display uppercase tracking-wide">Quick Actions</h2>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('seller.books.create') }}" class="block w-full bg-sage text-neutral-900 px-4 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide text-center">
                    + List New Book
                </a>
                <a href="{{ route('seller.orders.index') }}" class="block w-full bg-coral text-white px-4 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide text-center">
                    Process Orders
                </a>
                <a href="{{ route('seller.earnings') }}" class="block w-full bg-neutral-900 text-white px-4 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide text-center">
                    View Earnings
                </a>
            </div>
        </div>

        <!-- Store Status -->
        <div class="bg-gradient-to-br from-sage to-green-700 border-4 border-neutral-900 shadow-brutal p-6 text-white">
            <div class="flex items-start gap-3 mb-4">
                <div class="w-3 h-3 bg-green-400 rounded-full mt-1.5 animate-pulse"></div>
                <div>
                    <h3 class="font-bold text-lg mb-1">Store Active</h3>
                    <p class="text-sm text-white/80">Your store is live and visible to customers</p>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t-2 border-white/20">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-white/80">Store Rating</span>
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                        <span class="ml-1 font-bold">4.8</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
