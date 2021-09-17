@if($paginator->hasPages())

<nav class="d-flex justify-content-between" aria-label="Page navigation">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="page-link" href="javascript:;"><i class='bx bx-chevron-left'></i> Prev</a>
        </li>
        @else
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class='bx bx-chevron-left'></i> Prev</a>
        </li>
        @endif
    </ul>
    <ul class="pagination">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item d-none d-sm-block disabled" aria-disabled="true"><a class="page-link" href="javascript:;">{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item d-none d-sm-block active" aria-current="page"><a class="page-link" href="javascript:;">{{ $page }}</a></li>
        @else
        <li class="page-item d-none d-sm-block"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

    </ul>
    <ul class="pagination">

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next <i class='bx bx-chevron-right'></i></a>
        </li>
        @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">Next <i class='bx bx-chevron-right'></i></span>
        </li>
        @endif
    </ul>
</nav>

@endif