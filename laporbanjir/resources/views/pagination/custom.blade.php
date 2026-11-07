@if ($paginator->hasPages())
<nav class="pg">
    @if ($paginator->onFirstPage())
        <span class="off">‹ Sebelumnya</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}">‹ Sebelumnya</a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="off">{{ $element }}</span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="on">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}">Berikutnya ›</a>
    @else
        <span class="off">Berikutnya ›</span>
    @endif
</nav>
@endif