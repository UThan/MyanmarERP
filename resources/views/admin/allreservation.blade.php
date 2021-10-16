<x-admin-dashboard>
    <x-slot name="title">
        All reservations
    </x-slot>

    <div class="row">
        <div class="col-12">
            <x-alert />
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All reservations</h3>

                    <div class="card-tools">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="title" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Member name</th>
                                <th>Book title</th>
                                <th>Category</th>
                                <th>Reserved date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $reservation->member->name }}</td>
                                    <td>{{ $reservation->book->title }}</td>
                                    <td>{{ $reservation->book->category->category_name }}</td>
                                    <td>{{ $reservation->reservation_date }}</td>
                                    <td>{{ $reservation->reservation_status->status_value }}</td>
                                    <th>
                                        <x-form :action="route('book.destroy',$reservation->id)" method="DELETE">
                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                    class="fa fa-check-circle"></i></button>
                                            <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                                        </x-form>
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
    </div>

</x-admin-dashboard>
