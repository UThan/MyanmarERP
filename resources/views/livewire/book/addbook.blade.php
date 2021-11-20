<x-slot name="title">
    <x-admin-title />
</x-slot>
<div class="card">

    <div class="card-body">
        <h5> Add New Book </h5>

        <hr>

        <form wire:submit.prevent="submit">

            <div class="form-row">
                <div class="col">
                    <x-form.input name="field.title" label="Title" placeholder="Enter book title" />
                </div>
                <div class="col">
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
                    <x-form.select multiple='multiple' :options='$authors' name="field.author" label="Author Name"
                        placeholder="Enter author name" />
                </div>

                <div class="col">
                    <x-form.select :options='$genres' name="field.genre" label="Genre" placeholder="Enter book genre"
                        multiple='multiple' />
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <x-form.select :options='$categories' name="field.level" label="Category"
                        placeholder="Select category" />
                </div>
                <div class="col">
                    <x-form.select :options='$levels' name="field.level" label="Level" placeholder="Select level" />
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

            <hr>

            <button class="btn btn-primary float-right">Save Book</button>
        </form>
    </div>
</div>
