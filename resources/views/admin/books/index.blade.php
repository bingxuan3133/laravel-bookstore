@extends('layouts.admin')

@section('title', 'Manage Books')
@section('page-title', 'Books')
@section('page-description', 'Manage all books in the marketplace')

@section('content')
<!-- Success Message -->
@if(session('success'))
<div class="mb-6 bg-green-100 border-4 border-green-500 p-4">
    <p class="text-green-700 font-bold">{{ session('success') }}</p>
</div>
@endif

<!-- Filters -->
<div class="mb-6 bg-white border-4 border-neutral-900 shadow-brutal p-6">
    <form action="{{ route('admin.books.index') }}" method="GET" class="flex flex-wrap gap-4">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-xs font-bold mb-2 uppercase tracking-wide">Search</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Title or author..." class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:ring-offset-2 font-medium">
        </div>
        <div class="w-48">
            <label class="block text-xs font-bold mb-2 uppercase tracking-wide">Category</label>
            <select name="category" class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:ring-offset-2 font-medium">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                <option value="{{ $category->id ?? 'uncategorized' }}" {{ request('category') == ($category->id ?? 'uncategorized') ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="flex items-end gap-2">
            <button type="submit" class="px-6 py-3 bg-coral text-white border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                Filter
            </button>
            @if(request()->has('search') || request()->has('category'))
            <a href="{{ route('admin.books.index') }}" class="px-6 py-3 bg-white border-3 border-neutral-900 hover:bg-neutral-50 transition-colors font-bold uppercase text-sm tracking-wide">
                Clear
            </a>
            @endif
        </div>
    </form>
</div>

<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="bg-white border-3 border-neutral-900 shadow-brutal p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-neutral-500 mb-1">Total Books</p>
                <p class="text-3xl font-black font-display">{{ $books->total() }}</p>
            </div>
            <div class="w-12 h-12 bg-sage border-2 border-neutral-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-neutral-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Books List -->
<div class="bg-white border-4 border-neutral-900 shadow-brutal">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-neutral-50 border-b-3 border-neutral-900">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Book</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Category</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Seller</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Details</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Status</th>
                    <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-neutral-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y-2 divide-neutral-100">
                @forelse($books as $book)
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
                            <p class="font-bold text-neutral-900">{{ $book->seller->store_name }}</p>
                            <p class="text-neutral-600">{{ $book->seller->user->name }}</p>
                        </div>
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
                            <button onclick="openCategoryModal({{ $book->id }}, {{ $book->category_id ?? 'null' }})" class="p-2 border-2 border-neutral-900 bg-white hover:bg-sage hover:border-sage transition-colors" title="Change Category">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="w-16 h-16 bg-neutral-100 border-3 border-neutral-900 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-black font-display mb-2">No Books Found</h3>
                            <p class="text-neutral-600">No books match your current filters.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($books->hasPages())
    <div class="px-6 py-4 border-t-3 border-neutral-900 bg-neutral-50">
        {{ $books->links('vendor.pagination.brutal') }}
    </div>
    @endif
</div>

<!-- Change Category Modal -->
<div id="categoryModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white border-4 border-neutral-900 shadow-brutal max-w-lg w-full">
        <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50 flex items-center justify-between">
            <h3 class="text-xl font-bold font-display">Change Book Category</h3>
            <button onclick="closeModal('categoryModal')" class="text-neutral-600 hover:text-neutral-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="categoryForm" method="POST" class="p-6">
            @csrf
            @method('PATCH')
            <div class="mb-6">
                <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Select Category *</label>
                <select name="category_id" id="categorySelect" class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:ring-offset-2 font-medium">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-3">
                <button type="button" onclick="closeModal('categoryModal')" class="flex-1 px-6 py-3 border-3 border-neutral-900 bg-white hover:bg-neutral-50 transition-colors font-bold uppercase text-sm tracking-wide">
                    Cancel
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-sage text-neutral-900 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}

function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}

function openCategoryModal(bookId, currentCategoryId) {
    document.getElementById('categoryForm').action = `/admin/books/${bookId}/category`;
    // Handle null (uncategorized) - the select has empty string value for Uncategorized option
    document.getElementById('categorySelect').value = currentCategoryId === null ? '' : currentCategoryId;
    openModal('categoryModal');
}
</script>
@endsection
