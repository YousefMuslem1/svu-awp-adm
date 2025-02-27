@if ($paginator->hasPages())

    <nav class="flexbox mt-30">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> @lang('pagination.previous')</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-white"><i class="ti-arrow-left fs-9 mr-4"></i> @lang('pagination.previous')</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-white "><i class="ti-arrow-left fs-9 mr-4"></i> @lang('pagination.next')</a>
        @else
            <a class="btn btn-white disabled" href="#">@lang('pagination.next') <i class="ti-arrow-right fs-9 ml-4"></i></a>
        @endif

    </nav>
@endif
