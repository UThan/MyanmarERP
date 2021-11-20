<div>
    <div class="modal-header">
        <h5 class="modal-title text-dark">Import from CVS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        @unless($upload)
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('upload') is-invalid @enderror" id="uploadcvs"
                    wire:model='upload'>
                <label class="custom-file-label" for="uploadcvs">Upload CVS <i class="fa fa-upload ml-2"
                        aria-hidden="true"></i></label>
                @error('upload')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @else

            <x-custom.select name="field.level" label='Level' :options="$columns" />
            <x-custom.select name="field.no" label='Book no' :options="$columns" />
            <x-custom.select name="field.series" label='Series' :options="$columns" />
            <x-custom.select name="field.title" label='title' :options="$columns" />
            <x-custom.select name="field.level" label='Level' :options="$columns" />
            <x-custom.select name="field.author" label='Author' :options="$columns" />
            <x-custom.select name="field.genre" label='Genre' :options="$columns" />
            <x-custom.select name="field.setting" label='Setting' :options="$columns" />
            <x-custom.select name="field.pages" label='Pages' :options="$columns" />
            <x-custom.select name="field.total" label='Total' :options="$columns" />
            <x-custom.select name="field.category" label='Category' :options="['1'=> 'libary reader series' ,'2'=>'class
                    reader series']" />
        @endunless

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary" wire:click='import' @unless($upload) disabled
            @endunless>Import</button>
    </div>
</div>
