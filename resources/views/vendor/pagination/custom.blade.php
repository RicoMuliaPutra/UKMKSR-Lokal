@if ($paginator->hasPages())
    <nav class="flex justify-center py-3 mt-4 space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-white border rounded cursor-not-allowed">
                &lsaquo;
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="px-4 py-2 text-gray-700 bg-white border rounded hover:bg-gray-100">
                &lsaquo;
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-4 py-2 text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 font-bold text-white bg-red-500 border rounded">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                           class="px-4 py-2 text-gray-700 bg-white border rounded hover:bg-gray-100">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="px-4 py-2 text-gray-700 bg-white border rounded hover:bg-gray-100">
                &rsaquo;
            </a>
        @else
            <span class="px-4 py-2 text-gray-400 bg-white border rounded cursor-not-allowed">
                &rsaquo;
            </span>
        @endif
    </nav>
@endif
