@extends('layouts.admin')

@section('title', 'Manage Sellers')
@section('page-title', 'Sellers')
@section('page-description', 'Manage seller accounts and approvals')

@section('content')
<!-- Success Messages -->
@if(session('success'))
<div class="mb-6 bg-green-100 border-4 border-green-500 p-4">
    <p class="text-green-700 font-bold">{{ session('success') }}</p>
</div>
@endif

<!-- Filters -->
<div class="mb-6 bg-white border-4 border-neutral-900 shadow-brutal p-6">
    <form action="{{ route('admin.sellers.index') }}" method="GET" class="flex flex-wrap gap-4">
        <div class="w-48">
            <label class="block text-xs font-bold mb-2 uppercase tracking-wide">Status</label>
            <select name="status" class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:ring-offset-2 font-medium">
                <option value="">All Statuses</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <div class="flex items-end gap-2">
            <button type="submit" class="px-6 py-3 bg-coral text-white border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                Filter
            </button>
            @if(request()->has('status'))
            <a href="{{ route('admin.sellers.index') }}" class="px-6 py-3 bg-white border-3 border-neutral-900 hover:bg-neutral-50 transition-colors font-bold uppercase text-sm tracking-wide">
                Clear
            </a>
            @endif
        </div>
    </form>
</div>

<!-- Sellers List -->
<div class="bg-white border-4 border-neutral-900 shadow-brutal">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-neutral-50 border-b-3 border-neutral-900">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Store</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Owner</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">About</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Status</th>
                    <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-neutral-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y-2 divide-neutral-100">
                @forelse($sellers as $seller)
                <tr class="hover:bg-neutral-50 transition-colors">
                    <td class="px-6 py-4">
                        <div>
                            <h3 class="font-bold text-neutral-900">{{ $seller->store_name }}</h3>
                            <p class="text-xs text-neutral-500">ID: {{ $seller->id }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div>
                            <p class="font-bold text-neutral-900">{{ $seller->user->name }}</p>
                            <p class="text-sm text-neutral-600">{{ $seller->user->email }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-neutral-600 max-w-xs truncate">{{ $seller->about ?? 'N/A' }}</p>
                    </td>
                    <td class="px-6 py-4">
                        @if($seller->seller_status->value === 'approved')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 border-2 border-green-400 text-green-700 text-xs font-bold uppercase tracking-wide">
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                Approved
                            </span>
                        @elseif($seller->seller_status->value === 'pending')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-amber-100 border-2 border-amber-400 text-amber-700 text-xs font-bold uppercase tracking-wide">
                                <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                Pending
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-red-100 border-2 border-red-400 text-red-700 text-xs font-bold uppercase tracking-wide">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                Rejected
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            @if($seller->seller_status->value !== 'approved')
                            <form action="{{ route('admin.sellers.approve', $seller) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 bg-green-500 text-white border-2 border-neutral-900 hover:bg-green-600 transition-colors font-bold text-xs uppercase tracking-wide" title="Approve">
                                    Approve
                                </button>
                            </form>
                            @endif

                            @if($seller->seller_status->value !== 'rejected')
                            <form action="{{ route('admin.sellers.reject', $seller) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white border-2 border-neutral-900 hover:bg-red-600 transition-colors font-bold text-xs uppercase tracking-wide" title="Reject">
                                    Reject
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="w-16 h-16 bg-neutral-100 border-3 border-neutral-900 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-black font-display mb-2">No Sellers Found</h3>
                            <p class="text-neutral-600">No sellers match your current filters.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($sellers->hasPages())
    <div class="px-6 py-4 border-t-3 border-neutral-900 bg-neutral-50">
        {{ $sellers->links('vendor.pagination.brutal') }}
    </div>
    @endif
</div>
@endsection
