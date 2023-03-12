<?php
    $link_limit = 7;
?>
@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Previous</span>
            </li>
        @else
            <li class="page-item">
                <a  class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Previous</a>
            </li>
        @endif
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="page-item{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }} <span class="sr-only">(current)</span></a>
                </li>
            @endif
        @endfor
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </li>
        @else
            <li class="page-item disabled"><span class="page-link">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></li>
        @endif
    </ul>
@endif
