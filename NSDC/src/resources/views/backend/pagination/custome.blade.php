@push('css')
    <style>
    ul.pager {
        margin: 0;
        padding: 0;
        list-style: none;
        text-align: center;
    }

    ul.pager li {
        display: inline-block;
        margin-right: 5px;
    }

    ul.pager li a, ul.pager li span {
        display: block;
        padding: 8px 15px;
        text-decoration: none;
        color: #333;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 3px;
    }

    ul.pager li.active span {
        background-color: #609513;
        color: #fff;
        border: 1px solid #609513;
    }

    ul.pager li.disabled span, ul.pager li.disabled a {
        color: #777;
        background-color: #eee;
        cursor: not-allowed;
    }

    /* Optional: Hover effect */
    ul.pager li a:hover {
        background-color: #ddd;
    }

    </style>
@endpush
@if ($paginator->hasPages())
    <ul class="pager">
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>← Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled"><span>Next →</span></li>
        @endif
    </ul>
@endif


