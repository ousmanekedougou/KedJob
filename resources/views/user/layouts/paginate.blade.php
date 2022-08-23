<style>
    .pagination-outer{ text-align: center; }
.pagination{
    font-family: 'Poppins', sans-serif;
    display: inline-flex;
    position: relative;
}
.pagination li a.page-link{
    color: #2c3e50;
    background: #fff;
    font-size: 18px;
    font-weight: 500;
    line-height: 38px;
    height: 38px;
    width: 38px;
    padding: 0;
    margin: 0 5px;
    border: 1px solid #2c3e50;
    border-radius: 100%;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.pagination li a.page-link:hover,
.pagination li a.page-link:focus,
.pagination li.active a.page-link:hover,
.pagination li.active a.page-link{
    color: #27ae60;
    background: #fff;
    border-color: transparent;
}
.pagination li a.page-link:before{
    content: '';
    background-color: #27ae60;
    height: 100%;
    width: 100%;
    border-radius: 100%;
    transform: scale(0);
    position: absolute;
    left: 0;
    top: 0;
    z-index: -1;
    transition: all 0.3s ease 0s;
}
.pagination li a.page-link:hover:before,
.pagination li a.page-link:focus:before,
.pagination li.active a.page-link:hover:before,
.pagination li.active a.page-link:before{
    opacity: 0.25;
    transform: scale(1.1);
}
@media only screen and (max-width: 480px){
    .pagination{
        font-size: 0;
        display: inline-block;
    }
    .pagination li{
        display: inline-block;
        vertical-align: top;
        margin: 10px 0;
    }
}
</style>

<div class="demo">
    @if ($paginator->hasPages())
        <nav class="pagination-outer" aria-label="Page navigation">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li class="page-item">
                    <a href="#" class="page-link" aria-label="Previous" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page"><a class="page-link">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="#" class="page-link" aria-label="Next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>

                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">»</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>