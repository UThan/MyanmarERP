@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" disabled>Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="#" wire:click.prevent='previousPage'>Previous</a>
                </li>
            @endif


            @foreach ($elements as $element)


                @if (is_string($element))
                    <li class="page-item disabled">
                        <a class="page-link" href="#" disabled>{{ $element }}</a>
                    </li>
                @endif

                @if (is_array($element))

                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link" href="#"
                                    wire:click.prevent="gotoPage({{ $page }})">{{ $page }} </a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="#"
                                    wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                @endif
            @endforeach


            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="#" wire:click.prevent='nextPage'>Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" disabled>Last Page</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
