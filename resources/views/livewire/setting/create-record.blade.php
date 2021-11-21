<div class="text-dark">
    <div class="modal-header py-2">
        <h5 class="modal-title">Add {{ $name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form wire:submit.prevent='add{{ $name }}'>
        <div class="modal-body">

            <x-form.input name='inputValue' placeholder="{{ $name }}" label='{{ $name }}' inline='9' />

        </div>
        <div class="modal-footer py-2">
            <x-form.submit>Save</x-form-submit>
        </div>
    </form>
</div>
