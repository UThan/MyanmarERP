<x-slot name="title">
    <x-admin-title title='Borrow List' :dirs="['home' => 'home', 'borrowlist' => 'borrowlist']" />
</x-slot>

<div>
    <x-alert />

    <x-modal id="modalRentStatus">
        @livewire('manage.edit-rent-status')
    </x-modal>

    <div class="row">
        <div class="col-lg-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title mb-0">Borrow List</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Member Name</th>
                                <th>Books</th>
                                <th>Rented Date</th>
                                <th>Action</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentlists as $rentlist)
                                <tr>
                                    <td>{{ $rentlist->id }}</td>
                                    <td>{{ $rentlist->member->name }}</td>
                                    <td>{{ $rentlist->books_count }}</td>
                                    <td>{{ $rentlist->rent_date }}</td>
                                    <td  style="width: 10%; text-align: center">
                                        <a href="#" class="text-muted" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span><i
                                                class="fas fa-ellipsis-v"></i>
                                        </a>

                                        <div class="dropdown-menu" role="menu">                                            
                                            <a class="dropdown-item text-danger" href="#"
                                                wire:click.prevent='deleteList({{ $rentlist->id }})'>
                                                <i class="fas fa-trash mr-2"></i> Delete</a>
                                        </div>
                                    </td>
                                    <td style="width: 10%">
                                        <a href="#" wire:click.prevent="show({{$rentlist->id}})"><i class="fa fa-angle-double-right text-muted" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                @if ($rentlists->hasPages())
                    <div class="card-footer">
                        {{ $rentlists->links() }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title mb-0">Books List</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Book title</th>
                                <th>Level</th>                                
                                <th>Return</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($booklists && $booklists->count())
                                @foreach ($booklists as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->level->name}}</td>  
                                        <td>
                                            @if ($book->pivot->rent_status_id == 2)
                                                {{$book->pivot->return_date}}
                                            @else
                                            <a href="#" class="btn btn-primary btn-sm" wire:click.prevent='return({{ $book->id }})'> Return </a>
                                            @endif
                                        </td>                                    
                                        <td>
                                            <a href="#" class="text-muted" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span><i
                                                    class="fas fa-ellipsis-v"></i>
                                            </a>

                                            <div class="dropdown-menu" role="menu">                                                                                                
                                                <a class="dropdown-item text-danger" href="#"
                                                    wire:click.prevent='deletebook({{ $book->id }})'>
                                                    <i class="fas fa-trash mr-2"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

               
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
