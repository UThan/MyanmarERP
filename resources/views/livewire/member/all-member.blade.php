<x-slot name="title">
    <x-admin-title />
</x-slot>


<div class="row">
    <div class="col">
        <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAddMember">Add member <i
                class="fa fa-plus ml-2" aria-hidden="true"></i></a>

        <x-modal id="modalAddMember">
            @livewire('member.addmember')
        </x-modal>
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title mb-0">All members</h3>

                <div class="card-tools">

                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input wire:model='search' type="text" name="title" class="form-control float-right"
                            placeholder="Search">
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

                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                        <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>

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
