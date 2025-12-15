@extends('layouts.seller')

@section('title', 'Store Settings')
@section('page-title', 'Store Settings')
@section('page-description', 'Manage your store information')

@section('content')
<div class="max-w-4xl">
    <!-- Store Information Card -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal mb-8">
        <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50">
            <h2 class="text-xl font-bold font-display uppercase tracking-wide">Store Information</h2>
        </div>

        <div class="p-6">
            <form method="POST" action="#" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Store Name -->
                <div>
                    <label for="store_name" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Store Name
                    </label>
                    <input type="text"
                           id="store_name"
                           name="store_name"
                           value="{{ $seller->store_name }}"
                           class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium"
                           required>
                </div>

                <!-- Store Description -->
                <div>
                    <label for="description" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                        Store Description
                    </label>
                    <textarea id="description"
                              name="description"
                              rows="4"
                              class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium">{{ $seller->description ?? '' }}</textarea>
                    <p class="text-sm text-neutral-600 mt-2">Tell customers about your bookstore</p>
                </div>

                <!-- Contact Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_email" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                            Contact Email
                        </label>
                        <input type="email"
                               id="contact_email"
                               name="contact_email"
                               value="{{ $seller->contact_email ?? $seller->user->email }}"
                               class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium">
                    </div>

                    <div>
                        <label for="contact_phone" class="block text-sm font-bold uppercase tracking-wide text-neutral-700 mb-2">
                            Contact Phone
                        </label>
                        <input type="tel"
                               id="contact_phone"
                               name="contact_phone"
                               value="{{ $seller->contact_phone ?? '' }}"
                               class="w-full px-4 py-3 border-3 border-neutral-900 focus:outline-none focus:ring-3 focus:ring-sage focus:ring-offset-2 font-medium">
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex items-center justify-end gap-4 pt-4 border-t-2 border-neutral-200">
                    <button type="submit"
                            class="bg-sage text-neutral-900 px-6 py-3 border-3 border-neutral-900 shadow-brutal hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-none transition-all duration-200 font-bold uppercase text-sm tracking-wide">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Account Status Card -->
    <div class="bg-white border-4 border-neutral-900 shadow-brutal">
        <div class="px-6 py-4 border-b-3 border-neutral-900 bg-neutral-50">
            <h2 class="text-xl font-bold font-display uppercase tracking-wide">Account Status</h2>
        </div>

        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-bold uppercase tracking-wide text-neutral-700 mb-1">Verification Status</p>
                    <div class="flex items-center gap-2">
                        @if($seller->status === 'approved')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 border-2 border-green-400 text-green-700 text-xs font-bold uppercase tracking-wide">
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                Approved
                            </span>
                        @elseif($seller->status === 'pending')
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-amber-100 border-2 border-amber-400 text-amber-700 text-xs font-bold uppercase tracking-wide">
                                <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                Pending Review
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-neutral-100 border-2 border-neutral-400 text-neutral-700 text-xs font-bold uppercase tracking-wide">
                                <span class="w-2 h-2 bg-neutral-500 rounded-full"></span>
                                {{ ucfirst($seller->status) }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            @if($seller->status === 'pending')
                <div class="bg-amber-50 border-2 border-amber-400 p-4 rounded">
                    <p class="font-bold text-amber-900 mb-2">Account Under Review</p>
                    <p class="text-amber-800 text-sm">Your seller account is currently being reviewed by our team. You'll be notified once it's approved.</p>
                </div>
            @endif

            <div class="mt-6 pt-6 border-t-2 border-neutral-200">
                <p class="text-sm text-neutral-600">
                    <span class="font-bold">Member since:</span> {{ $seller->created_at->format('F d, Y') }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
