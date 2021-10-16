<x-admin-dashboard>
    <x-slot name="title">
        All books
    </x-slot>

    <div class="row">
        <div class="col-12">
            <x-alert />
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Books</h3>

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
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Publication date</th>
                                <th>Available</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>
                                        @foreach ($book->authors as $author)
                                            {{ $author->name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $book->category->category_name }}</td>
                                    <td>{{ $book->publication_date }}</td>
                                    <th>{{ $book->copies_owned }}</th>
                                    <th>
                                        <x-form :action="route('book.destroy',$book->id)" method="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></button>
                                            <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                                        </x-form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                @if ($books->hasPages())
                    <div class="card-footer">
                        {{ $books->links() }}
                    </div>
                @endif
            </div>
            <!-- /.card -->
        </div>
    </div>

</x-admin-dashboard>
