<div>
    <form wire:submit.prevent='submit'>
        <div class="modal-header">
            <h5 class="modal-title">Edit member</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <x-form.input name='member.name' label='Name' aria-placeholder="Enter member name" />
            <x-form.input type='email' name='member.email' label='Email' aria-placeholder="Enter email" />
            <x-form.input type='tel' name='member.phone_no' label='Phone number'
                aria-placeholder="Enter phone number" />

            <hr>
            <x-form.select name='field.hostel' label='Hostel' aria-placeholder="Enter hostel name" />
            <x-form.select name='field.classroom' label='Classroom' aria-placeholder="Enter classroom" />


        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
