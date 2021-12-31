<div class="modal fade show" id="{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div {{ $attributes->merge(['class' => 'modal-dialog']) }} role="document">
        <div class="modal-content">
            @isset($header)
                <div class="modal-header">
                    {!! $header !!}
                </div>
            @endisset
            @isset($body)
                <div class="modal-body">
                    {!! $body !!}
                </div>
            @endisset
            @isset($footer)
                <div class="modal-footer">
                    {!! $footer !!}
                </div>
            @endisset
            {!! $slot !!}
        </div>
    </div>
</div>
