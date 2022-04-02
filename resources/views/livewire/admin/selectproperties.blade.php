<x-slot name="title">
    <x-admin-title title='Setting' :dirs="['home' => 'home', 'book' => 'book']" />
</x-slot>

<div>
    <div class="row">
        <div class="col-lg-6 col-md-8  offset-lg-3 offset-md-2">
            <div class="card">
                <h5 class="card-header">
                    Manage 
                </h5>
                <div class="card-body my-5">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <x-form.select :options='$fields' name="field" label="Properties"
                                placeholder="Select properties" inline='9' />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('property', $field)}}" class="btn btn-primary float-right" {{ $field ? '' : 'disabled' }}>Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>
