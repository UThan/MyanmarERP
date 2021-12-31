<div>
    <form wire:submit.prevent='submit'>
        <div class="modal-header">
            <h5 class="mb-0"> {{$manage}} Location </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <div class="form-row">
                <div class="col">
                    <x-form.input name="location.name" label="Location" placeholder="Enter location name" inline='9' />
                </div>                               
            </div> 
        </div>        
     
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
