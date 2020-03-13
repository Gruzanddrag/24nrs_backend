<section class="pagination__wrapper">
    <div class="container">
        <div class="pagination__outer">
            @if ($paginator->hasPages())
                @if ($paginator->onFirstPage())
                    <a class="btn__pagination--move" style="color: rgba(57,72,93,.5);" disabled>Назад</a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn__pagination--move">Назад</a>
                @endif
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($paginator->currentPage() > 3 && $page === 2)
                                <span class="btn__pagination">...</span>
                            @endif
                            @if($page == $paginator->currentPage())
                                <a class="btn__pagination is-active" style="color: white">{{ $page }}</a>
                            @elseif($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2 || $page === $paginator->lastPage() || $page === 1)
                                <a href="{{ $url }}" class="btn__pagination">{{ $page }}</a>
                            @endif
                            @if ($paginator->currentPage() < $paginator->lastPage() - 3 && $page === $paginator->lastPage() - 1)
                                    <span class="btn__pagination">...</span>
                            @endif
                        @endforeach
                    @endif

                    @if ($paginator->hasMorePages())
                        <a class="btn__pagination--move" href="{{ $paginator->nextPageUrl() }}" rel="next">Вперед</a>
                    @else
                        <a class="btn__pagination--move" style="color: rgba(57,72,93,.5);" disabled>Вперед</a>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</section>



