@props(['name', 'options' => []])
<div class="input-group">
    <label>Category</label>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">

        @foreach ($options as $value)
            <div class="btn btn-secondary">
                <input type="radio" wire:model='{{ $name }}' :name=" $name" id="{{ $name . $value }}">
                {{ $value }}
            </div>
        @endforeach
    </div>
</div>
