@extends('layouts.seller')

@section('title', 'Add New Book')
@section('page-title', 'Add New Book')
@section('page-description', 'List a new book in your store')

@section('content')
<div class="max-w-4xl">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('seller.books.index') }}" class="inline-flex items-center gap-2 text-neutral-600 hover:text-neutral-900 font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Books
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal">
        <!-- Header -->
        <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50">
            <h2 class="text-xl font-bold font-display uppercase tracking-wide">Book Information</h2>
        </div>

        <!-- Form -->
        <form action="{{ route('seller.books.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf

            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Book Title <span class="text-coral">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium @error('title') border-coral @enderror"
                        placeholder="Enter book title"
                        required
                    >
                    @error('title')
                        <p class="mt-2 text-sm text-coral font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Author -->
                <div>
                    <label for="author" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Author <span class="text-coral">*</span>
                    </label>
                    <input
                        type="text"
                        id="author"
                        name="author"
                        value="{{ old('author') }}"
                        class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium @error('author') border-coral @enderror"
                        placeholder="Enter author name"
                        required
                    >
                    @error('author')
                        <p class="mt-2 text-sm text-coral font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Language -->
                <div>
                    <label for="language" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Language <span class="text-coral">*</span>
                    </label>
                    <input
                        type="text"
                        id="language"
                        name="language"
                        value="{{ old('language') }}"
                        class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium @error('language') border-coral @enderror"
                        placeholder="e.g., English"
                        required
                    >
                    @error('language')
                        <p class="mt-2 text-sm text-coral font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Country & Year Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                            Country <span class="text-coral">*</span>
                        </label>
                        <input
                            type="text"
                            id="country"
                            name="country"
                            value="{{ old('country') }}"
                            class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium @error('country') border-coral @enderror"
                            placeholder="e.g., USA"
                            required
                        >
                        @error('country')
                            <p class="mt-2 text-sm text-coral font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Year -->
                    <div>
                        <label for="year" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                            Publication Year <span class="text-coral">*</span>
                        </label>
                        <input
                            type="number"
                            id="year"
                            name="year"
                            value="{{ old('year') }}"
                            class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium @error('year') border-coral @enderror"
                            placeholder="e.g., 2024"
                            min="1000"
                            max="{{ date('Y') + 1 }}"
                            required
                        >
                        @error('year')
                            <p class="mt-2 text-sm text-coral font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Pages -->
                <div>
                    <label for="pages" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Number of Pages <span class="text-coral">*</span>
                    </label>
                    <input
                        type="number"
                        id="pages"
                        name="pages"
                        value="{{ old('pages') }}"
                        class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium @error('pages') border-coral @enderror"
                        placeholder="e.g., 350"
                        min="1"
                        required
                    >
                    @error('pages')
                        <p class="mt-2 text-sm text-coral font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Cover Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Cover Image <span class="text-coral">*</span>
                    </label>
                    <div class="relative">
                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept="image/*"
                            class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-sage file:text-neutral-900 file:font-bold file:uppercase file:text-xs file:tracking-wide hover:file:bg-sage/80 @error('image') border-coral @enderror"
                            required
                        >
                    </div>
                    @error('image')
                        <p class="mt-2 text-sm text-coral font-medium">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-neutral-500">Upload a book cover image (JPG, PNG, or WEBP)</p>
                </div>

                <!-- Image Preview -->
                <div id="imagePreview" class="hidden">
                    <label class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Preview
                    </label>
                    <div class="w-48 h-64 border-3 border-neutral-900 bg-neutral-100 overflow-hidden">
                        <img id="previewImg" src="" alt="Cover preview" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Link -->
                <div>
                    <label for="link" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Book Link/Reference <span class="text-coral">*</span>
                    </label>
                    <input
                        type="url"
                        id="link"
                        name="link"
                        value="{{ old('link') }}"
                        class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium @error('link') border-coral @enderror"
                        placeholder="https://example.com/book-reference"
                        required
                    >
                    @error('link')
                        <p class="mt-2 text-sm text-coral font-medium">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-neutral-500">External link or reference for this book</p>
                </div>

                <!-- Stock -->
                <div>
                    <label for="stock" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Number of Stock <span class="text-coral">*</span>
                    </label>
                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        value="{{ old('stock') }}"
                        class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium @error('stock') border-coral @enderror"
                        placeholder="e.g., 1"
                        min="1"
                        required
                    >
                    @error('stock')
                        <p class="mt-2 text-sm text-coral font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Price <span class="text-coral">*</span>
                    </label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        value="{{ old('price') }}"
                        class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium @error('price') border-coral @enderror"
                        placeholder="e.g., 1"
                        step="0.01"
                        min="0"
                        inputmode="decimal"
                        required
                    >
                    @error('price')
                        <p class="mt-2 text-sm text-coral font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Divider -->
                <div class="border-t-2 border-neutral-200"></div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-4">
                    <a
                        href="{{ route('seller.books.index') }}"
                        class="px-6 py-3 border-3 border-neutral-900 bg-white hover:bg-neutral-50 transition-colors font-bold uppercase text-sm tracking-wide"
                    >
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="px-6 py-3 bg-sage text-neutral-900 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide"
                    >
                        Add Book
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Help Card -->
    <div class="mt-6 bg-blue-50 border-3 border-blue-400 p-6">
        <div class="flex items-start gap-3">
            <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <h3 class="font-bold text-blue-900 mb-2">Tips for Adding Books</h3>
                <ul class="text-sm text-blue-800 space-y-1">
                    <li>• Ensure all required fields (marked with *) are filled out</li>
                    <li>• Use high-quality cover images for better visibility</li>
                    <li>• Double-check the publication year and page count</li>
                    <li>• Supported image formats: JPG, PNG, WEBP (max 5MB)</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
// Image preview functionality
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    } else {
        document.getElementById('imagePreview').classList.add('hidden');
    }
});
</script>
@endsection
