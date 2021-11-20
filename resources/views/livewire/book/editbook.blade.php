<div>
    <form wire:submit.prevent='submit'>
        <div class="modal-header">
            <h5 class="mb-0"> Edit Book </h5>
        </div>

        <div class="modal-body">

            <div class="form-row">
                <div class="col">
                    <x-form.input name="field.title" label="Title" placeholder="Enter book title" />
                </div>
                <div class=" col">
                    <x-form.input name="field.book_no" label="Book Number" type="number"
                        placeholder="Enter book number" />
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <x-form.input name="field.copies_owned" label="No of copies" type="number"
                        placeholder="Enter no of copies owned" />
                </div>
                <div class="col">
                    <x-form.input name="field.pages" label="Pages" type="number" placeholder="Enter pages a in book" />
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <x-form.select multiple :options='$authors' name="field.author" label="Author Name"
                        placeholder="Enter author name" />
                </div>

                <div class="col">
                    <x-form.select :options='$genres' name="field.genre" label="Genre" placeholder="Enter book genre"
                        multiple />
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <x-form.select :options='$categories' name="field.category" label="Category"
                        placeholder="Select category" />
                </div>
                <div class="col">
                    <x-form.select :options='$levels' name="book.level_id" label="Level" placeholder="Select level" />
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <x-form.select :options='$settings' name="field.setting" label="Setting"
                        placeholder="Select setting / location" />
                </div>
                <div class="col">
                    <x-form.select :options='$series' name="field.series" label="Series"
                        placeholder="Select series name" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
