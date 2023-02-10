<x-slot name="title">
    <x-admin-title :title="$title" :dirs="['home' => 'home', 'setting' => 'setting']" />
</x-slot>

<div class="row">

    <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-2">
        <x-alert />
        <a href="{{route('addproperty',$title)}}" class="btn btn-primary mb-2" >Create <i
                class="fa fa-plus ml-2" aria-hidden="true"></i></a>

        <div class="card card-dark">
            <div class="card-header">
                {{ $title }}
            </div>
            <div class="card-body p-0">
                @if ($models && $models->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                    @if ($title == 'Series')
                                    <th>Description</th>
                                    @endif
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $model->name }}</td>
                                        @if ($title == 'Series')                                        
                                        <td>{{ $model->description }}</td>
                                        @endif
                                    <td style="width: 10%">
                                        <a href="#" class="text-muted" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span><i
                                                class="fas fa-ellipsis-v"></i>
                                        </a>

                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="{{route('editproperty',[$title,$model->id])}}">
                                                <i class="fas fa-edit mr-2 "></i> Edit</a>

                                            <a class="dropdown-item text-danger" href="#"  wire:click.prevent="delete({{$model->id}})">
                                                <i class="fas fa-trash mr-2"></i> Delete</a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted p-4 mb-0">No data to shown</p>
                @endif
            </div>
            @if ($models->hasPages())
                <div class="card-footer pb-0">
                    {{ $models->onEachSide(1)->links() }}
                </div>
            @endif
        </div>

    </div>
</div>
