<x-slot name="title">
    <x-admin-title title='Books' :dirs="['home' => 'home', 'book' => 'book']" />
</x-slot>

<div >
    <x-alert />

    <div class="row">
        <div class="col">
            <div class="card card-secondary">
                <div class="card-header">
                    <div class="card-title">
                        Books Locations
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    @if ($locations && $locations->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Main Location</th>
                                <th>Sub Location</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $location)
                                <tr wire:click="show({{$location->id}})">
                                    <td>{{$location->name}}</td>
                                    <td>{{$location->parentlocation->name}}</td>   
                                    <td>                                            
                                        <a href="#" ><i class="fa fa-angle-double-right text-muted" aria-hidden="true"></i></a>                                                  
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
        
               
            </div>
        </div>

        <div class="col">
            <div class="card card-secondary">
                <div class="card-header">
                    <div class="card-title">
                        Books 
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    @if ($details && $details->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Genre</th>
                                    <th>Total Copy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
                                        <td>{{$detail->genre}}</td>
                                        <td>{{$detail->total}}</td>  
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-muted p-4 mb-0">No data to shown</p>
                    @endif
                </div>
                <!-- /.card-body -->
        
               
            </div>
        </div>
    </div>
</div>
