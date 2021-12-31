<x-slot name="title">
    <x-admin-title title='Borrow List' :dirs="['home' => 'home', 'borrowlist' => 'borrowlist']" />
</x-slot>

<div>
    <x-alert />

    <x-modal id="modalEditBorrowList">
        @livewire('manage.edit-borrow-list')
    </x-modal>
    
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title mb-0">Borrowed Book List</h3>

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
                                <button href="#" class="btn btn-text" type="button" data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span><i class="fas fa-ellipsis-v"></i>
                                </button>

                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent='edit({{ $borrowlist->id }})'>
                                        <i class="fas fa-edit mr-2 "></i> Edit</a>
                                    <a class="dropdown-item text-danger" href="#"
                                        wire:click.prevent='delete({{ $borrowlist->id }})'>
                                        <i class="fas fa-trash mr-2"></i> Delete</a>
                                </div>
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
</div>
