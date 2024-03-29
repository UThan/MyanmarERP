<x-slot name="title">
    <x-admin-title title='Setting' :dirs="['home' => 'home', 'book' => 'book']" />
</x-slot>

<div>
    <div class="row">
        <!-- <div class="col-lg-6 col-md-8  offset-lg-3 offset-md-2">
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
        </div> -->

        @foreach ($fields as $name => $modal)
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{$modal::count()}}</h3>

                    <p>{{$name}}</p>
                </div>                
            <a href="{{route('property', $name)}}" class="small-box-footer">Edit <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</div>
