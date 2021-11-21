@props(['type' => 'text', 'name', 'label', 'inline' => false, 'options' => [], 'placeholder' => false, 'multiple' => false])

<div class="form-group {{ $inline ? 'row' : '' }}">
    @isset($label)
    <label for="{{ $name }}" class="@if ($inline) col-sm-{{ 12 - $inline }} col-form-label @endif">{{ $label }}</label>
    @endisset

    @if ($inline)
        <div class="col-sm-{{ $inline }}">
    @endif
    <select class="custom-select @error($name) is-invalid  @enderror" name="{{ $name }}" id="{{ $name }}"
        wire:model='{{ $name }}' {{ $multiple ? 'multiple' : '' }}>
        <option selected>{{ $placeholder ? $placeholder : 'Select option..' }}</option>

        @forelse ($options as $key=>$value)
            <option value="{{ $key }}">{{ $value }}</option>
        @empty
            {{ $slot }}
        @endforelse
    </select>
    <x-form.error :name="$name" />
    @if ($inline)</div>@endif
</div>
