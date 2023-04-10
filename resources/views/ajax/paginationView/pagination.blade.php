<div class="col-lg-12 col-md-12">
    <div class="pagination-area">
        <nav aria-label="Page navigation" class="newsnavigation">
            @if ($paginator->hasPages())
                <ul class="pagination justify-content-center thisPagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <!-- Prev page is disable -->
                        <li class="disabled page-item"><span class="page-link"><i class="fas fa-caret-left"></i></span></li>
                    @else
                        <!-- Prev page is enable -->
                        <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-caret-left"></i></a></li>
                    @endif


                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <!-- Next page is enable -->
                        <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fas fa-caret-right"></i></a></li>
                    @else
                        <!-- Next page is disable -->
                        <li class="disabled page-item"><span class="page-link"><i class="fas fa-caret-right"></i></span></li>
                    @endif
                </ul>
            @endif

        </nav>
    </div>
</div>
