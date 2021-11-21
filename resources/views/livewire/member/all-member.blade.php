<x-slot name="title">
    <x-admin-title title='Member List' :dirs="['home' => 'home', 'member' => 'member']" />
</x-slot>


<div class="row">
    <div class="col">
        <x-alert />
        <a href="{{route('addmember')}}" class="btn btn-primary mb-2">New <i
                class="fa fa-plus ml-2" aria-hidden="true"></i></a>

        

        <x-modal id="modalEditMember">
            @livewire('member.editmember')
        </x-modal>
        <div class="card card-dark">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-2 col-md-4">
                        <x-form.select name="search.classrooms" label="Classroom" :options='$classrooms' />
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <x-form.select name="search.hostels" label="Hostel" :options='$hostels' />
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <x-form.select name="search.status" label="Member status" :options='$status' />
                    </div>
                    <div class="col-lg-4 col-md-6 offset-2">
                        <x-form.input type='search' label="Search" name="search.member" placeholder="Search ..." />
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                @if ($members && $members->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
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
                                    <td>{{ $member->joined_date }}</td>
                                    <td>{{ $member->member_status->name }}</td>
                                    <th>

                                        <a href="#" wire:click.prevent='deleteMember({{ $member->id }})'
                                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        <a href="#" wire:click.prevent='editMember({{ $member->id }})'
                                            class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted p-4 mb-0">No data to shown</p>
                @endif
            </div>
            <!-- /.card-body -->

            @if ($members->hasPages())
                <div class="card-footer">
                    {{ $members->links() }}
                </div>
            @endif


        </div>
        <!-- /.card -->
    </div>
</div>
