@extends('layouts.admin')

@section('title', 'Manage Categories')
@section('page-title', 'Categories')
@section('page-description', 'Manage book categories')

@section('content')
<!-- Success/Error Messages -->
@if(session('success'))
<div class="mb-6 bg-green-100 border-4 border-green-500 p-4">
    <p class="text-green-700 font-bold">{{ session('success') }}</p>
</div>
@endif

@if(session('error'))
<div class="mb-6 bg-red-100 border-4 border-red-500 p-4">
    <p class="text-red-700 font-bold">{{ session('error') }}</p>
</div>
@endif

<!-- Action Bar -->
<div class="flex items-center justify-between mb-8">
    <div>
        <p class="text-neutral-600">Total: <span class="font-bold">{{ $categories->total() }}</span> categories</p>
    </div>
    <button onclick="openModal('createModal')" class="bg-coral text-white px-6 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide inline-flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        Add Category
    </button>
</div>

<!-- Categories List -->
<div class="bg-white border-4 border-neutral-900 shadow-brutal">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-neutral-50 border-b-3 border-neutral-900">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Name</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Description</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-neutral-700">Books</th>
                    <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-neutral-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y-2 divide-neutral-100">
                @forelse($categories as $category)
                <tr class="hover:bg-neutral-50 transition-colors">
                    <td class="px-6 py-4">
                        <span class="font-bold text-neutral-900">{{ $category->name }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-neutral-600">{{ $category->description ?? 'N/A' }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-3 py-1 bg-sage/20 border-2 border-sage text-sage text-xs font-bold uppercase tracking-wide">
                            {{ $category->book_count }} books
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick="openEditModal({{ $category->id }}, '{{ addslashes($category->name) }}', '{{ addslashes($category->description) }}')" class="p-2 border-2 border-neutral-900 bg-white hover:bg-sage hover:border-sage transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 border-2 border-neutral-900 bg-white hover:bg-coral hover:border-coral transition-colors" title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="w-16 h-16 bg-neutral-100 border-3 border-neutral-900 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-black font-display mb-2">No Categories Yet</h3>
                            <p class="text-neutral-600 mb-4">Start by creating your first category.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($categories->hasPages())
    <div class="px-6 py-4 border-t-3 border-neutral-900 bg-neutral-50">
        {{ $categories->links('vendor.pagination.brutal') }}
    </div>
    @endif
</div>

<!-- Create Modal -->
<div id="createModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white border-4 border-neutral-900 shadow-brutal max-w-lg w-full">
        <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50 flex items-center justify-between">
            <h3 class="text-xl font-bold font-display">Create Category</h3>
            <button onclick="closeModal('createModal')" class="text-neutral-600 hover:text-neutral-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('admin.categories.store') }}" method="POST" class="p-6">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Name *</label>
                <input type="text" name="name" required class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:ring-offset-2 font-medium">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Description *</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:ring-offset-2 font-medium"></textarea>
            </div>
            <div class="flex gap-3">
                <button type="button" onclick="closeModal('createModal')" class="flex-1 px-6 py-3 border-3 border-neutral-900 bg-white hover:bg-neutral-50 transition-colors font-bold uppercase text-sm tracking-wide">
                    Cancel
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-coral text-white border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                    Create
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white border-4 border-neutral-900 shadow-brutal max-w-lg w-full">
        <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50 flex items-center justify-between">
            <h3 class="text-xl font-bold font-display">Edit Category</h3>
            <button onclick="closeModal('editModal')" class="text-neutral-600 hover:text-neutral-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form id="editForm" method="POST" class="p-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Name *</label>
                <input type="text" name="name" id="editName" required class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:ring-offset-2 font-medium">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold mb-2 uppercase tracking-wide">Description *</label>
                <textarea name="description" id="editDescription" rows="3" class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-coral focus:ring-offset-2 font-medium"></textarea>
            </div>
            <div class="flex gap-3">
                <button type="button" onclick="closeModal('editModal')" class="flex-1 px-6 py-3 border-3 border-neutral-900 bg-white hover:bg-neutral-50 transition-colors font-bold uppercase text-sm tracking-wide">
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

function openEditModal(id, name, description) {
    document.getElementById('editForm').action = `/admin/categories/${id}`;
    document.getElementById('editName').value = name;
    document.getElementById('editDescription').value = description || '';
    openModal('editModal');
}
</script>
@endsection
