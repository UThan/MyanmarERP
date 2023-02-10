<div class="card">
    <div class="card-header pt-4">
        <div class="row">
            <div class="col-md-2">
                <x-form.select name="search.category" placeholder='By category' :options='$categories' />
            </div>
            <div class="col-md-2">
                <x-form.select name="search.level" placeholder="Level" :models='$levels' />
            </div>
            <div class="col-md-2">
                <x-form.select name="search.booklocation" placeholder="Location" :models='$institutions' />
            </div>
            <div class="col-md-2">
                <x-form.select name="search.storylocation" placeholder="Story Location" :models='$storylocations' />
            </div>
            <div class="col-md-2 offset-md-2">
                <x-form.input type='search' name="search.book" placeholder="Enter title..." />
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if ($books && $books->count() > 0)
            <table class="table">
                <thead class='bg-info'>
                    <tr>
                        <th>#</th>
                        <th style="width: 20%">Title</th>
                        <th>Author</th>
                        <th>Book Location</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->level->name }}_{{ $book->book_no }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                {{ $book->book_location ? $book->book_location->name : 'Unknown' }}
                            </td>

                            <td>
                                {{ $book->genre ? $book->genre->name : 'Unknown' }}
                            </td>

                            <td style="width: 4rem; padding: 5px">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="{{ $book->id }}" wire:model.lazy='selectedbooks' value='{{ $book->id }}'>
                                    <label for="{{ $book->id }}"></label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @else
            <p class="text-center text-muted p-4 mb-0">No data to shown</p>
        @endif
    </div>

    <div class="card-footer">
        <button class="btn btn-primary float-right" @if (!$selectedbooks) disabled @endif
            wire:click="selectbook">Next</button>
        <button class="btn btn-secondary float-right mr-2" wire:click="$emit('back')">Back</button>
    </div>


</div>
