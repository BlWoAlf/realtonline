@if ($paginator->hasPages())
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous pagination__item pagination__item_disable" disabled><i class="fas fa-chevron-left"></i></a>
        @else
            <a class="pagination-previous pagination__item" href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
        @endif        

        {{-- Pagination Elements --}}
        <ul class="pagination-list horizontal-list">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis">…</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><a class="pagination-link is-current pagination__item pagination__item_current" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}" class="pagination-link pagination__item" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                @endif
            @endforeach
        </ul>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination-next pagination__item" href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
        @else
            <a class="pagination-next pagination__item pagination__item_disable" disabled><i class="fas fa-chevron-right"></i></a>
        @endif

    </nav>
@endif
