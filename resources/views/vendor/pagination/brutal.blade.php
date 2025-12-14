@if ($paginator->hasPages())
    <div class="flex items-center justify-between">
        <div class="text-sm text-neutral-600">
            Showing <span class="font-bold">{{ $paginator->firstItem() }}</span> to <span class="font-bold">{{ $paginator->lastItem() }}</span> of <span class="font-bold">{{ $paginator->total() }}</span> books
        </div>

        <nav class="flex items-center gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="px-4 py-2 border-2 border-neutral-900 bg-white transition-colors font-bold text-sm opacity-50 cursor-not-allowed" disabled>
                    Previous
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 border-2 border-neutral-900 bg-white hover:bg-neutral-100 transition-colors font-bold text-sm">
                    Previous
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-4 py-2 font-bold text-sm text-neutral-400">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="px-4 py-2 border-2 border-neutral-900 bg-sage text-neutral-900 font-bold text-sm" disabled>
                                {{ $page }}
                            </button>
                        @else
                            <a href="{{ $url }}" class="px-4 py-2 border-2 border-neutral-900 bg-white hover:bg-neutral-100 transition-colors font-bold text-sm">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 border-2 border-neutral-900 bg-white hover:bg-neutral-100 transition-colors font-bold text-sm">
                    Next
                </a>
            @else
                <button class="px-4 py-2 border-2 border-neutral-900 bg-white transition-colors font-bold text-sm opacity-50 cursor-not-allowed" disabled>
                    Next
                </button>
            @endif
        </nav>
    </div>
@endif
