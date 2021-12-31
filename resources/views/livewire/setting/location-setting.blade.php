<x-slot name="title">
    <x-admin-title title='Location Setting' :dirs="['home' => 'home', 'locationsetting' => 'locationsetting']" />
</x-slot>


<div>
    <x-alert />
    <a href="#" class="btn btn-primary mb-2" wire:click.prevent='create(0)'>Add
        <i class="fa fa-plus ml-2" aria-hidden="true"></i></a>

    <x-modal id="modalLocation">
        @livewire('setting.create-location')
    </x-modal>


    <div class="row">
        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="card-title">Main Locations</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    @if ($locations && $locations->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>                                
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $location)
                            <tr>
                                <td>
                                    {{ $location->name }}
                                </td>
                                
                                <td style="width: 10%">
                                    <a href="#" class="text-muted" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span><i class="fas fa-ellipsis-v"></i>
                                    </a>

                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#"
                                            wire:click.prevent='edit({{ $location->id }})'>
                                            <i class="fas fa-edit mr-2 "></i> Edit</a>
                                        <a class="dropdown-item text-success" href="#"
                                            wire:click.prevent='create({{ $location->id }})'>
                                            <i class="fas fa-plus mr-2"></i>Sub Location</a>
                                        @if (!$location->sublocations_count)
                                        <a class="dropdown-item text-danger" href="#"
                                        wire:click.prevent='delete({{ $location->id }})'>
                                        <i class="fas fa-trash mr-2"></i> Delete</a>
                                        @endif
                                    </div>

                                </td>

                                <td style="width: 10%">
                                    <a href="#" wire:click.prevent="showSubLocation({{$location}})"><i class="fa fa-angle-double-right text-muted" aria-hidden="true"></i></a>
                                </td>
                            </tr>                            
                    @endforeach
                    </tbody>
                    </table>
                    @else
                    <p class="text-center text-muted p-4 mb-0">No data to shown</p>
                    @endif
                </div>
                <!-- /.card-body -->

                @if ($locations->hasPages())
                <div class="card-footer pb-0">
                    {{ $locations->onEachSide(1)->links() }}
                </div>
                @endif
            </div>
        </div>


        <div class="col-6">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="card-title">Sub Locations</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    @if ($sublocations && $sublocations->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Books</th>
                                <th>Members</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sublocations as $location)
                            <tr>
                                <td>{{ $location->name }}</td>
                                <td>{{ $location->books_count }}</td>
                                <td>{{ $location->members_count }}</td>
                                <td style="width: 10%">
                                    <a href="#" class="text-muted" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span><i class="fas fa-ellipsis-v"></i>
                                    </a>

                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#"
                                            wire:click.prevent='edit({{ $location->id }})'>
                                            <i class="fas fa-edit mr-2 "></i> Edit</a>
                                        @if (!$location->books_count && !$location->members_count)
                                        <a class="dropdown-item text-danger" href="#"
                                        wire:click.prevent='delete({{ $location->id }})'>
                                        <i class="fas fa-trash mr-2"></i> Delete</a>
                                        @endif
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
                <!-- /.card-body -->

                @if ($locations->hasPages())
                <div class="card-footer pb-0">
                    {{ $locations->onEachSide(1)->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

</div>