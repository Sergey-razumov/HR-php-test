<nav aria-label="Page navigation">
    <ul class="pagination">
        <li @if($items->currentPage() === 1) class="disabled" @endif>
            <a href="{{ $items->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @for($page = 1; $page <= $items->lastPage(); $page++)
            <li @if($page === $items->currentPage()) class="active" @endif>
                <a href="{{ $items->url($page) }}">{{ $page }}</a>
            </li>
        @endfor
        <li @if($items->currentPage() === $items->lastPage()) class="disabled" @endif>
            <a href="{{ $items->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
