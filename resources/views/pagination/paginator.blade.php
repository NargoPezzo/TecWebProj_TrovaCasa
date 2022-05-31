@if ($paginator->lastPage() != 1)
    <div class="col-lg-12">
        <div class="pagination">
            <ul>
                
                @if ($paginator->onFirstPage())
                <li class="active">
                @else
                <li>
                @endif
                <a href="{{ $paginator->url(1) }}">1</a>
                </li>
                
                for 
                @if ($paginator->onFirstPage())
                <li class="active">
                @else
                <li>
                @endif
                <a href="{{ $paginator->url(1) }}">1</a>
                </li>
                
                @if ($paginator->currentPage() == 2)
                <li class="active">
                @else
                <li>
                @endif
                <a href="{{ $paginator->url(2) }}">2</a>
                </li>
                
                @if ($paginator->currentPage() == 3)
                <li class="active">
                @else
                <li>
                @endif
                <a href="{{ $paginator->url(3) }}">3</a>
                </li>
                
                @if ($paginator->currentPage() == 4)
                <li class="active">
                @else
                <li>
                @endif
                <a href="{{ $paginator->url(4) }}">4</a>
                </li>
                
                <li>
                    <a href="#">></a>
                </li>
            </ul>
        </div>
    </div>
@endif

<!--
@if ($paginator->lastPage() != 1)
    <div class="col-lg-12">
        <div id="pagination">
            <ul>
                {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} di {{ $paginator->total() }} ---
                
                <li>
                
                @if (!$paginator->onFirstPage())
                
                    <a href="{{ $paginator->url(1) }}">1</a>

                @endif

                </li>

                
                @if ($paginator->currentPage() != 1)
                    <a href="{{ $paginator->previousPageUrl() }}">&lt; Precedente</a> |
                @else
                    &lt; Precedente |
                @endif

                
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}">Successivo &gt;</a> |
                @else
                    Successivo &gt; |
                @endif

                
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->url($paginator->lastPage()) }}">Fine</a>
                @else
                    Fine
                @endif
            </ul>
        </div>
</div>
@endif
-->
