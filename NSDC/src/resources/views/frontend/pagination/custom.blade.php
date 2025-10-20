@push('css')
    <style>

    </style>
@endpush
@if ($paginator->hasPages())
    <ul class="styled-pagination text-center clearfix pager">
        @if ($paginator->onFirstPage())
            <li class="arrow prev" style="pointer-events: none;"><a href="#" style="cursor: not-allowed"><span class="icon-right-arrow-1 left"></span></a></li>
        @else
            <li class="arrow prev"><a href="{{ $paginator->previousPageUrl() }}"><span class="icon-right-arrow-1 left"></span></a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="active">{{ $element }}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" style="pointer-events: none;"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="arrow next"><a href="{{ $paginator->nextPageUrl() }}"><span class="icon-right-arrow-1 right"></span></a></li>
        @else
            <li class="arrow next" style="pointer-events: none;"><a href="#"><span class="icon-right-arrow-1 right"></span></a></li>
        @endif
    </ul>
@endif


