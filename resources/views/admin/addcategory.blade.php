<x-admin-dashboard>
    <x-slot name="title">
        Setting
    </x-slot>

    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card card-info">
                <div class="card-header">
                    <h1 class="card-title">
                        Category
                    </h1>
                </div>
                <x-form method='POST' action="/category">
                    <div class="card-body">
                        <x-alert />
                        <x-form-input name='name' label='Category name' />
                    </div>
                    <div class="card-footer">
                        <x-form-submit />
                    </div>
                </x-form>
            </div>
        </div>
    </div>
</x-admin-dashboard>
