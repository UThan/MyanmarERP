<x-slot name="title">
    <x-admin-title title='Member List' :dirs="['home' => 'home', 'member' => 'member']" />
</x-slot>


<div class="row">
    <div class="col">
        <x-alert />
        <a href="{{route('addmember')}}" class="btn btn-primary mb-2">New <i
                class="fa fa-plus ml-2" aria-hidden="true"></i></a>
        
                <div class="card card-dark">
                    <div class="card-header pt-4">
                        <div class="row">
                            <div class="col-md-2 ">
                                <x-form.select name="search.region" placeholder="Region" :models='$regions' />
                            </div>   
                            <div class="col-md-2">
                                <x-form.select name="search.institution" placeholder="Institution" :models='$institutions' />
                            </div>                   
                            <div class="col-md-2">
                                <x-form.select name="search.member_status" placeholder="Member status" :models='$memberstatuses' />
                            </div>
                            <div class="col-md-2">
                                <x-form.select name="search.showonly" :options='$record' />
                            </div>
                            <div class="col-lg-2 offset-lg-2 col-md-4 offset-md-0">
                                <x-form.input type='search' placeholder="Search" name="search.name" placeholder="Search ..." />
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if ($members && $members->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Member Since</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->phone_no }}</td>
                                            <td>{{ $member->joined_date }}</td>
                                            <td><span
                                                    class="badge badge-{{ $member->member_status->status }}">{{ $member->member_status->name }}</span>
                                            </td>
                                            <th>
        
                                                <a href="#" class="text-muted" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span><i
                                                        class="fas fa-ellipsis-v"></i>
                                                </a>
        
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{route('editmember', $member->id)}}">
                                                        <i class="fas fa-edit mr-2 "></i> Edit</a>
                                                    <a class="dropdown-item text-danger" href="#"
                                                        wire:click.prevent='delete({{ $member->id }})'>
                                                        <i class="fas fa-trash mr-2"></i> Delete</a>
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center text-muted p-4 mb-0">No data to shown</p>
                        @endif
                    </div>
                </div>
        
    </div>
</div>
