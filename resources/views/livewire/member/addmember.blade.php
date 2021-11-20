<div>
    <form wire:submit.prevent='submit'>
        <div class="modal-header">
            <h5 class="modal-title">Register new member</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <x-form.input name='field.name' label='Name' aria-placeholder="Enter member name" />
            <x-form.input type='email' name='field.email' label='Email' aria-placeholder="Enter email" />
            <x-form.input type='tel' name='field.phone_no' label='Phone number' aria-placeholder="Enter phone number" />
            <a href="#" class="btn btn-secondary btn-sm"
                wire:click.prevent="$toggle('showhostel')">{{ $showhostel ? 'Hide' : 'More +' }}</a>

            @if ($showhostel)
                <hr>
                <x-form.select name='field.hostel' label='Hostel' aria-placeholder="Enter hostel name" />
                <x-form.select name='field.classroom' label='Classroom' aria-placeholder="Enter classroom" />
            @endif

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
