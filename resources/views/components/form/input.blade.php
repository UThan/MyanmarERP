@props(['type' => 'text', 'name', 'label', 'inline' => false, 'placeholder'])
<div class="form-group {{ $inline ? 'row' : '' }}">
    @isset($label)
        <label for="{{ $name }}" @if ($inline)
            class="col-sm-{{ 12 - $inline }} col-form-label"
            @endif>{{ $label }}</label>
    @endisset

    @if ($inline)
        <div class="col-sm-{{ $inline }}">
    @endif

    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
        wire:model='{{ $name }}' name="{{ $name }}" id="{{ $name }}" @isset($placeholder)
        placeholder="{{ $placeholder }}" @endisset>

    <x-form.error :name="$name" />
    @if ($inline)</div>@endif
</div>
