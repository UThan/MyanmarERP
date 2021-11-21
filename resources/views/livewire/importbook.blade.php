<div>
    <div class="modal-header">
        <h5 class="modal-title text-dark">Import from CVS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">       
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('upload') is-invalid @enderror" id="uploadcvs"
                    wire:model='upload'>
                <label class="custom-file-label" for="uploadcvs">Upload Excel or CSV <i class="fa fa-upload ml-2"
                        aria-hidden="true"></i></label>
                @error('upload')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>   
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary" wire:click='import' @unless($upload) disabled
            @endunless>Import</button>
    </div>
</div>
