@props(['type' => 'text', 'name', 'label', 'inline' => false, 'options' => [], 'models', 'placeholder' => false, 'multiple' => false])

<div class="form-group {{ $inline ? 'row' : '' }}">
    @isset($label)
    <label for="{{ $name }}" class="@if ($inline) col-sm-{{ 12 - $inline }} col-form-label @endif">{{ $label }}</label>
    @endisset

    @if ($inline)
        <div class="col-sm-{{ $inline }}">
    @endif
    <select class="form-control @error($name) is-invalid  @enderror"
            name="{{ $name }}" id="{{ $name }}"
            wire:model='{{ $name }}' {{ $multiple ? 'multiple' : '' }}>

    @if ($placeholder)
        <option selected value="">{{ $placeholder ? $placeholder : 'Select option..' }}</option>
    @endif
    

        

        @isset($models)
            @foreach ($models as $model)
                <option value="{{ $model->id }}">{{ $model->name }}</option>
            @endforeach
        @else 
            @forelse ($options as $key=>$value)
                <option value="{{ $key }}">{{ $value }}</option>
            @empty
                {{ $slot }}
            @endforelse
        @endisset

    </select>
    <x-form.error :name="$name" />
    @if ($inline)</div>@endif
</div>
