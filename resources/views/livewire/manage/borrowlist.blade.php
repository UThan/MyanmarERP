<x-slot name="title">
    <x-admin-title title='Borrow List' :dirs="['home' => 'home', 'borrowlist' => 'borrowlist']"/>
</x-slot>

<x-alert />

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title mb-0">Reservation List</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" wire:model='search' class="form-control float-right" placeholder="Search">
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Member Name</th>
                    <th>Book title</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowlists as $borrowlist)
                    <tr>
                        <td>{{ $borrowlist->id }}</td>
                        <td>{{ $borrowlist->member->name }}</td>
                        <td>{{ $borrowlist->book->title }}</td>
                        <td>{{ $borrowlist->rent_date }}</td>
                        <td>{{ $borrowlist->rent_status->name }}</td>
                        <th>
                            <button class="btn btn-sm btn-danger" wire:click='confirm({{$borrowlist->id}})'><i class="fa fa-trash"></i></button>
                            <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    @if ($borrowlists->hasPages())
        <div class="card-footer">
            {{ $borrowlists->links() }}
        </div>
    @endif
</div>
<!-- /.card -->
