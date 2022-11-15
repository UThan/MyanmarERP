<x-slot name="title">
    <x-admin-title title='All Institutions' :dirs="['home' => 'home', 'institutions' => 'institution']" />
</x-slot>

<div class="row">
    <x-alert />    
 
    <div class="col-10 offset-1">
        <div class="card card-dark">
            <div class="card-header pt-4">
                <div class="row">                
                    <div class="col-lg-2 col-md-4">
                        <x-form.select name="search.region" placeholder="Region" :models="$regions" />
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <x-form.select name="search.institution_type" placeholder="Type" :models="$institution_types" />
                    </div>                    
                    <div class="col-lg-3 col-md-8 offset-lg-5">
                        <x-form.input type='search' placeholder="Institution" name="search.institution" placeholder="Search ..." />
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                @if ($institutions && $institutions->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>State/Division</th>
                                <th>Institution Type</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($institutions as $institution)                       
                                 <tr>
                                    <td>{{ $institution->id }}</td> 
                                    <td>{{ $institution->name }}</td> 
                                    <td>{{ $institution->region->name }}</td>   
                                    <td>{{ $institution->institution_type->name }}</td>                                 
                                    
                                    <td>
                                        
                                        <a href="#" class="text-muted" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span><i class="fas fa-ellipsis-v"></i>
                                        </a>
    
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="{{ route('editinstitution', $institution->id ) }}">
                                                   <i class="fas fa-edit mr-2 "></i> Edit</a>
                                                <a class="dropdown-item text-danger" href="#"  wire:click.prevent='delete("{{ $institution->id }})'>
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
            <!-- /.card-body -->
    
            @if ($institutions->hasPages())
                <div class="card-footer pb-0">
                    {{ $institutions->onEachSide(1)->links() }}
                </div>
            @endif
        </div>
    </div>
</div>


