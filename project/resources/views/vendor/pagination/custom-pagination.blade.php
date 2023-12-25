@if ($paginator->hasPages()) 
<nav aria-label="Page navigation example"> 
    <ul class="pagination justify-content-center"> 
        @if ($paginator->onFirstPage()) 
        <li class="page-item disabled"> 
            <a class="page-link" href="#" 
               tabindex="-1"><span class="page-link" aria-hidden="true">&lsaquo;</span></a> 
        </li> 
        @else 
        <li class="page-item"><a class="page-link" 
            href="{{ $paginator->previousPageUrl() }}"> 
            <span class="page-link" aria-hidden="true">&lsaquo;</span></a> 
          </li> 
        @endif 
  
        @foreach ($elements as $element) 
        @if (is_string($element)) 
        <li class="page-item disabled">{{ $element }}</li> 
        @endif 
  
        @if (is_array($element)) 
        @foreach ($element as $page => $url) 
        @if ($page == $paginator->currentPage()) 
        <li class="page-item activePag"> 
            <a class="page-link">{{ $page }}</a> 
        </li> 
        @else 
        <li class="page-item"> 
            <a class="page-link" 
               href="{{ $url }}">{{ $page }}</a> 
        </li> 
        @endif 
        @endforeach 
        @endif 
        @endforeach 
  
        @if ($paginator->hasMorePages()) 
        <li class="page-item"> 
            <a class="page-link" 
               href="{{ $paginator->nextPageUrl() }}"  
               rel="next"><span class="page-link" aria-hidden="true">&rsaquo;</span></a> 
        </li> 
        @else 
        <li class="page-item disabled"> 
            <a class="page-link" href="#"><span class="page-link" aria-hidden="true">&rsaquo;</span></a> 
        </li> 
        @endif 
    </ul> 
  </nav> 
    @endif 
