@props(['type' => 'text', 'label', 'inline' => false, 'options' => [], 'placeholder' => false, 'multiple' => false, 'name'])

<div class=" input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="{{ $name }}">{{ $label }}</label>
    </div>
    <select class="custom-select @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}"
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
