@if ($paginator->hasPages())

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="px-4 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded-lg" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 rounded-lg" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="px-4 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded-lg">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page"><span class="px-4 py-2 bg-blue-500 text-white rounded-lg">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-lg">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 rounded-lg" aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="px-4 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded-lg" aria-hidden="true">&raquo;</span>
                </li>
            @endif
@endif