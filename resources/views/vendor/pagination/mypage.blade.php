@if ($paginator->hasPages())
    <p>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span>@lang('pagination.previous')</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">@lang('pagination.previous')</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span>{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span>{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">@lang('pagination.next')</a>
        @else
            <span>@lang('pagination.next')</span>
        @endif
    </p>
@endif