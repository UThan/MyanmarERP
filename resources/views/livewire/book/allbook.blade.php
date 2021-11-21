<x-slot name="title">
    <x-admin-title title='Books' :dirs="['home' => 'home', 'book' => 'book']" />
</x-slot>

<div>
    <x-alert />
    <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalImport">Import <i
            class="fa fa-file-import ml-2" aria-hidden="true"></i></a>

    <a href="#" class="btn btn-secondary mb-2" wire:click.prevent='export'>Export <i class="fa fa-file-export ml-2"
            aria-hidden="true"></i></a>

    <x-modal id="modalImport">
        @livewire('importbook')
    </x-modal>

    <x-modal id="modalEdit">
        @livewire('book.editbook')
    </x-modal>

    <div class="card card-dark">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-2 col-md-4">
                    <x-form.select name="search.category" label="Category" :options='$categories' />
                </div>
                <div class="col-lg-2 col-md-4">
                    <x-form.select name="search.level" label="Level" :options='$levels' />
                </div>
                <div class="col-lg-2 col-md-4">
                    <x-form.select name="search.setting" label="Location" :options='$settings' />
                </div>
                <div class="col-lg-2 col-md-4">
                    <x-form.select name="search.showonly" label="Per page" :options='$record' />

                </div>
                <div class="col-lg-4 col-md-8">
                    <x-form.input type='search' label="Book title" name="search.book" placeholder="Search ..." />
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            @if ($books && $books->count() > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Level</th>
                            <th>Book no</th>
                            <th>Story Location</th>
                            <th>Genre</th>
                            <th>Page</th>
                            <th>Author</th>
                            <th>Series</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->level->name }}</td>
                                <td>{{ $book->book_no }}</td>
                                <td>{{ $book->setting->name }}</td>
                                <td>
                                    @foreach ($book->genres as $genre)
                                        {{ $genre->name }}
                                    @endforeach
                                </td>
                                <td>{{ $book->pages}}</td>
                                <td>
                                    @foreach ($book->authors as $author)
                                        {{ $author->name }}
                                    @endforeach
                                </td>
                                <th>{{ $book->copies_owned }}</th>
                                <th><span class="badge badge-success">{{ $book->copies_left }}</span>
                                </th>
                                <th>
                                    <button type="submit" class="btn btn-link"><i class="fa fa-trash text-danger"
                                            wire:click.prevent='delete({{ $book->id }})'></i></button>
                                    <button class="btn btn btn-link" wire:click.prevent='edit({{ $book->id }})'><i
                                            class="fa fa-edit text-warning"></i></button>
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

        @if ($books->hasPages())
            <div class="card-footer pb-0">
                {{ $books->onEachSide(1)->links() }}
            </div>
        @endif
    </div>
</div>
