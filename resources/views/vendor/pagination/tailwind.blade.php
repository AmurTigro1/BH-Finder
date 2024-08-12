@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center">
        <ul class="flex items-center space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 bg-blue-200 text-white rounded-md cursor-not-allowed">Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600" rel="prev">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="px-4 py-2 bg-white text-blue-500 rounded-md">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            @if ($page == $paginator->currentPage())
                                <span class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-4 py-2 bg-white text-blue-500 rounded-md hover:bg-blue-100">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600" rel="next">Next</a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 bg-blue-200 text-white rounded-md cursor-not-allowed">Next</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
