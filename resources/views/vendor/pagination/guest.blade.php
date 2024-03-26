@if ($paginator->hasPages())
    {{--    <div class="pagination-bx rounded-sm gray clearfix">--}}
    {{--        <ul class="pagination">--}}
    {{--            <li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>--}}
    {{--            <li class="active"><a href="#">1</a></li>--}}
    {{--            <li><a href="#">2</a></li>--}}
    {{--            <li><a href="#">3</a></li>--}}
    {{--            <li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>--}}
    {{--        </ul>--}}
    {{--    </div>--}}

    <div class="pagination-bx rounded-sm gray clearfix">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="previous disabled"><a href="#">@lang('pagination.previous')</a></li>
            @else
                <li class="next">
                    <a href="{{ $paginator->previousPageUrl() }}">@lang('pagination.previous')</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><span>{{$page}}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="next">
                    <a href="{{ $paginator->nextPageUrl()  }}">@lang('pagination.next')</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">@lang('pagination.next')</span>
                </li>
            @endif
        </ul>
    </div>
@endif
