<x-slot name="title">
    <x-admin-title />
</x-slot>

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                Header
            </div>
            <div class="card-body">
                <x-custom.select name="name" label='Name'
                    :options="['name'=>'value','name'=>'value','name'=>'value','name'=>'value']" />
            </div>
            <div class="card-footer text-muted">
                Footer
            </div>
        </div>
    </div>
</div>
