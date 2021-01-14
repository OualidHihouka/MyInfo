@if ($paginator->hasPages())
    
    <div class="container">
        <div class="mt-3 ">
            <ul class="pagination justify-content-center pagin" role="navigation">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled mt-1 mr-4 mb-1" aria-disabled="true" aria-label="@lang('pagination.previous')" >
                        <a class="page-link bg-secondary" aria-hidden="true">&laquo;</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link bg-secondary mt-1 mr-4 mb-1 acive" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                    </li>
                @endif


                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled " aria-disabled="true">
                            <a class="page-link bg-secondary mt-1 mr-1 mb-1">{{ $element }}</a>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link bg-primary mt-1 mr-1 mb-1">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link bg-secondary mt-1 mr-1 mb-1" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

               

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item mt-1 ml-4 mb-1" >
                        <a class="page-link bg-secondary pull-right" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled mt-1 ml-4 mb-1 pl-4" aria-disabled="true" aria-label="@lang('pagination.next')" >
                        <span class="page-link bg-secondary" aria-hidden="true">&raquo;</span>
                    </li>
                @endif
              

            </ul>
        </div>
    </div>
@endif
