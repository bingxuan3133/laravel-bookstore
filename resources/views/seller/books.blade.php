@extends('layouts.seller')

@section('title', 'Manage Books')
@section('page-title', 'My Books')
@section('page-description', 'Manage your book listings')

@section('content')
<!-- Action Bar -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
    <div class="flex items-center gap-4">
        <a href="{{ route('seller.books.create') }}" class="bg-sage text-neutral-900 px-6 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide inline-flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Add New Book
        </a>
    </div>

    <!-- Search & Filter -->
    <div class="flex items-center gap-3 w-full sm:w-auto">
        <div class="relative flex-1 sm:w-64">
            <input type="text" placeholder="Search books..." class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium">
            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <button class="p-3 border-3 border-neutral-900 bg-white hover:bg-neutral-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
            </svg>
        </button>
    </div>
</div>

<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Total Books</p>
                <p class="text-3xl font-black font-display">{{ $totalBooks }}</p>
            </div>
            <div class="w-12 h-12 bg-sage border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Published</p>
                <p class="text-3xl font-black font-display text-green-600">{{ $publishedBooks }}</p>
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
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Unpublished</p>
                <p class="text-3xl font-black font-display text-neutral-600">{{ $unpublishedBooks }}</p>
            </div>
            <div class="w-12 h-12 bg-neutral-300 border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Books List -->
<div class="bg-white border-4 border-neutral-900 shadow-brutal">
    <!-- Table Header -->
    <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50">
        <h2 class="text-xl font-bold font-display uppercase tracking-wide">Book Inventory</h2>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-neutral-50 border-b-3 border-neutral-900">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Book</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Category</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Details</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Status</th>
                    <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-neutral-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y-2 divide-neutral-100">
                @foreach($books as $book)
                <tr class="hover:bg-neutral-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            @if($book->hasMedia('book_covers'))
                                <img src="{{ $book->getFirstMediaUrl('book_covers', 'preview') }}"
                                     alt="{{ $book->title }}"
                                     class="w-12 h-16 object-cover border-3 border-neutral-900 flex-shrink-0">
                            @else
                                <div class="w-12 h-16 bg-gradient-to-br from-coral to-red-600 border-3 border-neutral-900 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="min-w-0">
                                <h3 class="font-bold text-neutral-900 truncate">{{ $book->title }}</h3>
                                <p class="text-sm text-neutral-600">by {{ $book->author }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-3 py-1 bg-sage/20 border-2 border-sage text-sage text-xs font-bold uppercase tracking-wide">
                            {{ $book->category->name ?? 'Uncategorized' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <p class="text-neutral-600"><span class="font-bold">Pages:</span> {{ $book->pages }}</p>
                            <p class="text-neutral-600"><span class="font-bold">Year:</span> {{ $book->year }}</p>
                            <p class="text-neutral-600"><span class="font-bold">Language:</span> {{ $book->language }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        @if($book->is_active)
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 border-2 border-green-400 text-green-700 text-xs font-bold uppercase tracking-wide">
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                Published
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-neutral-100 border-2 border-neutral-400 text-neutral-700 text-xs font-bold uppercase tracking-wide">
                                <span class="w-2 h-2 bg-neutral-500 rounded-full"></span>
                                Unpublished
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            @if($book->is_active)
                                <form action="{{ route('seller.books.unpublish', $book) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-2 border-2 border-neutral-900 bg-white hover:bg-amber-400 hover:border-amber-600 transition-colors" title="Unpublish">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('seller.books.publish', $book) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-2 border-2 border-neutral-900 bg-white hover:bg-green-400 hover:border-green-600 transition-colors" title="Publish">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t-3 border-neutral-900 bg-neutral-50">
        {{ $books->links('vendor.pagination.brutal') }}
    </div>

</div>

<!-- Empty State -->
@if($books->isEmpty())
<div class="bg-white border-4 border-neutral-900 shadow-brutal p-12 text-center">
    <div class="max-w-md mx-auto">
        <div class="w-24 h-24 bg-neutral-100 border-3 border-neutral-900 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>
        <h3 class="text-2xl font-black font-display mb-3">No Books Listed Yet</h3>
        <p class="text-neutral-600 mb-6">Start building your bookstore inventory by adding your first book listing.</p>
        <a href="{{ route('seller.books.create') }}" class="inline-block bg-sage text-neutral-900 px-6 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
            + Add Your First Book
        </a>
    </div>
</div>
@endif
@endsection
