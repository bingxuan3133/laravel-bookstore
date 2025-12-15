@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Overview of your bookstore performance')

@section('content')
<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Books -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal p-6 hover:-translate-y-1 transition-transform duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-sage border-3 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <span class="text-xs font-bold uppercase tracking-wide text-sage px-2 py-1 bg-sage/20 border-2 border-sage">Books</span>
        </div>
        <h3 class="text-4xl font-black font-display mb-2">1,234</h3>
        <p class="text-neutral-600 text-sm font-medium">Total Books Listed</p>
        <div class="mt-4 flex items-center text-xs">
            <span class="text-green-600 font-bold">+12%</span>
            <span class="text-neutral-500 ml-2">vs last month</span>
        </div>
    </div>

    <!-- Active Sellers -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal p-6 hover:-translate-y-1 transition-transform duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-coral border-3 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <span class="text-xs font-bold uppercase tracking-wide text-coral px-2 py-1 bg-coral/20 border-2 border-coral">Sellers</span>
        </div>
        <h3 class="text-4xl font-black font-display mb-2">87</h3>
        <p class="text-neutral-600 text-sm font-medium">Active Sellers</p>
        <div class="mt-4 flex items-center text-xs">
            <span class="text-green-600 font-bold">+5</span>
            <span class="text-neutral-500 ml-2">new this week</span>
        </div>
    </div>

    <!-- Total Users -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal p-6 hover:-translate-y-1 transition-transform duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-amber-400 border-3 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <span class="text-xs font-bold uppercase tracking-wide text-amber-600 px-2 py-1 bg-amber-100 border-2 border-amber-400">Users</span>
        </div>
        <h3 class="text-4xl font-black font-display mb-2">5,432</h3>
        <p class="text-neutral-600 text-sm font-medium">Registered Users</p>
        <div class="mt-4 flex items-center text-xs">
            <span class="text-green-600 font-bold">+234</span>
            <span class="text-neutral-500 ml-2">vs last month</span>
        </div>
    </div>

    <!-- Categories -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal p-6 hover:-translate-y-1 transition-transform duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-400 border-3 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
            </div>
            <span class="text-xs font-bold uppercase tracking-wide text-blue-600 px-2 py-1 bg-blue-100 border-2 border-blue-400">Categories</span>
        </div>
        <h3 class="text-4xl font-black font-display mb-2">10</h3>
        <p class="text-neutral-600 text-sm font-medium">Book Categories</p>
        <div class="mt-4 flex items-center text-xs">
            <span class="text-neutral-500">All active</span>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Books -->
    <div class="lg:col-span-2">
        <div class="bg-white border-4 border-neutral-900 shadow-brutal">
            <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50 flex items-center justify-between">
                <h2 class="text-xl font-bold font-display uppercase tracking-wide">Recent Books</h2>
                <a href="{{ route('admin.books.index') }}" class="text-sm text-coral hover:text-neutral-900 font-bold uppercase tracking-wide">View All →</a>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @for($i = 0; $i < 5; $i++)
                    <div class="flex items-center gap-4 pb-4 border-b-2 border-neutral-100 last:border-0">
                        <div class="w-16 h-20 bg-gradient-to-br from-coral to-red-600 border-3 border-neutral-900 flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-neutral-900 truncate">The Great Gatsby</h3>
                            <p class="text-sm text-neutral-600">by F. Scott Fitzgerald</p>
                            <p class="text-xs text-neutral-500 mt-1">Fiction • Added 2 hours ago</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="p-2 border-2 border-neutral-900 hover:bg-sage hover:border-sage transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                            <button class="p-2 border-2 border-neutral-900 hover:bg-coral hover:border-coral transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Pending -->
    <div class="space-y-6">
        <!-- Quick Actions -->
        <div class="bg-white border-4 border-neutral-900 shadow-brutal">
            <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50">
                <h2 class="text-xl font-bold font-display uppercase tracking-wide">Quick Actions</h2>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('admin.categories.index') }}" class="block w-full bg-sage text-neutral-900 px-4 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide text-center">
                    + Add Category
                </a>
                <a href="{{ route('admin.sellers.index') }}" class="block w-full bg-neutral-900 text-white px-4 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide text-center">
                    Manage Sellers
                </a>
            </div>
        </div>

        <!-- Pending Approvals -->
        <div class="bg-white border-4 border-neutral-900 shadow-brutal">
            <div class="px-6 py-4 border-b-3 border-neutral-900 bg-amber-50">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold font-display uppercase tracking-wide">Pending</h2>
                    <span class="px-3 py-1 bg-amber-400 border-2 border-neutral-900 text-xs font-bold">3</span>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <div class="flex items-start gap-3 p-3 bg-amber-50 border-2 border-amber-200">
                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-neutral-900">New Seller Registration</p>
                            <p class="text-xs text-neutral-600 mt-1">Book Haven Store</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-3 bg-amber-50 border-2 border-amber-200">
                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-neutral-900">Book Listing Review</p>
                            <p class="text-xs text-neutral-600 mt-1">2 books awaiting approval</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.sellers.index', ['status' => 'pending']) }}" class="block mt-4 text-center text-sm text-coral hover:text-neutral-900 font-bold uppercase tracking-wide">
                    View All Pending →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
