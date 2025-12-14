@extends('layouts.seller')

@section('title', 'Orders')
@section('page-title', 'Orders')
@section('page-description', 'Manage your book orders')

@section('content')
<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Total Orders</p>
                <p class="text-3xl font-black font-display">0</p>
            </div>
            <div class="w-12 h-12 bg-sage border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Pending</p>
                <p class="text-3xl font-black font-display text-amber-600">0</p>
            </div>
            <div class="w-12 h-12 bg-amber-400 border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Completed</p>
                <p class="text-3xl font-black font-display text-green-600">0</p>
            </div>
            <div class="w-12 h-12 bg-green-400 border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Revenue</p>
                <p class="text-3xl font-black font-display">$0</p>
            </div>
            <div class="w-12 h-12 bg-blue-400 border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Empty State -->
<div class="bg-white border-4 border-neutral-900 shadow-brutal p-12 text-center">
    <div class="max-w-md mx-auto">
        <div class="w-24 h-24 bg-neutral-100 border-3 border-neutral-900 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
        </div>
        <h3 class="text-2xl font-black font-display mb-3">No Orders Yet</h3>
        <p class="text-neutral-600 mb-6">Orders will appear here once customers start purchasing your books.</p>
        <div class="text-sm text-neutral-500 bg-amber-50 border-2 border-amber-400 p-4 rounded">
            <p class="font-bold text-amber-900 mb-2">Coming Soon</p>
            <p class="text-amber-800">Order management functionality is currently under development.</p>
        </div>
    </div>
</div>
@endsection
