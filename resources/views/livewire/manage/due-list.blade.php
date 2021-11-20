<x-slot name="title">
    <x-admin-title />
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
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->member->name }}</td>
                        <td>{{ $reservation->book->title }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->status }}</td>
                        <th>
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    @if ($reservations->hasPages())
        <div class="card-footer">
            {{ $reservations->links() }}
        </div>
    @endif
</div>
<!-- /.card -->
</div>
