<x-admin-dashboard>
    <x-slot name="title">
        Add new book
    </x-slot>

    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card card-info">
                <div class="card-header">
                    <h1 class="card-title">
                        Add new book
                    </h1>
                </div>
                <x-form method="POST" action='/book'>
                    <div class="card-body">
                        <x-alert />
                        <x-form-input name='title' label='Book title' placeholder='Enter book title' />
                        <x-form-select name="author" label='Author' :options="$authors" />
                        <x-form-select name="category" label='Category' :options="$categories" />
                        <x-form-input type='date' label='Publication date' name="publication_date"
                            placeholder='Enter publication date' />
                        <x-form-input type='number' label='No of copies' name="copies_owned"
                            placeholder='Enter book amount' />
                    </div>
                    <div class="card-footer">
                        <x-form-submit />
                    </div>
                </x-form>
            </div>
        </div>
    </div>
</x-admin-dashboard>
