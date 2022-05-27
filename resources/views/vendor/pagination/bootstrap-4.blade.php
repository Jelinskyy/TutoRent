@if ($paginator->hasPages())
    <nav>
        <div class="col d-flex justify-content-center my-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="btn btn-light text-danger fs-4 mx-1" disabled aria-disabled="true" aria-hidden="true" aria-label="@lang('pagination.previous')">
                    &lsaquo;
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')" rel="prev" class="btn btn-light text-danger fs-4 mx-1">
                    &lsaquo;
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="btn btn-light fs-4 mx-1" disabled aria-disabled="true">
                       {{ $element }}
                    </a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="btn btn-danger fs-4 mx-1" aria-current="page">
                                {{ $page }}
                            </a>
                        @else
                            <a href="{{ $url }}" class="btn btn-light text-danger fs-4 mx-1">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="btn btn-light text-danger fs-4 mx-1">
                    &rsaquo;
                </a>
            @else
                <a class="btn btn-light text-danger fs-4 mx-1" disabled aria-hidden="true" aria-disabled="true" aria-label="@lang('pagination.next')">
                    &rsaquo;
                </a>
            @endif
        </ul>
    </nav>
@endif
