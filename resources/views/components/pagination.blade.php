<p>Showing {{ $pagination->firstItem() }} to {{ $pagination->lastItem() }} of total {{ $pagination->total() }} results
</p>

@php
    $numberOfPages = ceil($pagination->total() / $pagination->perPage());
@endphp
@if ($pagination->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if (!$pagination->onFirstPage())
                <li class="page-item"><a class="page-link" href="{{ $pagination->previousPageUrl() }}">Previous</a></li>
            @endif
            @for ($i = 1; $i <= $numberOfPages; $i++)
                <li @class(['page-item', 'active' => $i == $pagination->currentPage()])><a class="page-link"
                        href="{{ $pagination->url($i) }}">{{ $i }}</a></li>
            @endfor
            @if (!$pagination->onLastPage())
                <li class="page-item"><a class="page-link" href="{{ $pagination->nextPageUrl() }}">Next</a></li>
            @endif
        </ul>
    </nav>
@endif
