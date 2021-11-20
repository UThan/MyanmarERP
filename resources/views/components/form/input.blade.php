@props(['type' => 'text', 'name', 'label', 'inline' => false])
<div class="form-group {{ $inline ? 'row' : '' }}">
    <label :for="$name" @if ($inline)
        class="col-sm-{{ 12 - $inline }} col-form-label"
        @endif>{{ $label }}</label>

    @if ($inline)
        <div class="col-sm-{{ $inline }}">
    @endif

    <input :type="$type" class="form-control @error('name') is-invalid @enderror" wire:model='{{ $name }}'
        :name="$name" id="{{ $name }}" :placeholder="$placeholder">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

    @if ($inline)</div>@endif
</div>
