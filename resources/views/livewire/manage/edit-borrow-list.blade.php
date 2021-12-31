<div>
    <form wire:submit.prevent='submit'>
        <div class="modal-header">
            <h5 class="mb-0"> Update Borrow Status </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <div class="form-row">
                <div class="col">
                    <x-form.select :models='$rentstatuses' name="rentlist.rent_status_id" label="Status" placeholder="Select status" />
                </div>               
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
