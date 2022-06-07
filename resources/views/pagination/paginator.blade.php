
@if ($paginator->lastPage() != 1)
<div class="col-lg-12">
    <div class="pagination">
        

        <!-- Link alla prima pagina -->
        <ul>
            <li>    
                @if (!$paginator->onFirstPage())
                    <a href="{{ $paginator->url(1) }}"><<</a>
                @endif
            </li>
            

        <!-- Link alla pagina precedente -->
        
            <li>
                @if ($paginator->currentPage() != 1)
                    <a href="{{ $paginator->previousPageUrl() }}" id="toColor"><</a>
                @endif
            </li>
                 
            <li class="active">
                <a> {{ $paginator->currentPage() }} </a>
            </li>
        <!-- Link alla pagina successiva -->
        
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" id="toColor">></a>
                @endif
            </li>
               

        <!-- Link all'ultima pagina -->
        
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->url($paginator->lastPage()) }}" id="toColor">>></a>
                @endif
            </li>
            
    </div>
</div>    
@endif

