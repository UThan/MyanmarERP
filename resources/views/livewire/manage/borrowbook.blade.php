<x-slot name="title">
    <x-admin-title />
</x-slot>

<div class="card">
    <div class="card-header">
        <div class="row">

            <div class="col-md-2">
                <x-form.select name="search.category" label="Category" :options='$categories' />
            </div>
            <div class="col-md-2">
                <x-form.select name="search.level" label="Level" :options='$levels' />
            </div>
            <div class="col-md-2">
                <x-form.select name="search.setting" label="Location" :options='$settings' />
            </div>
            <div class="col-md-5 offset-md-1">
                <x-form.input type='search' label="Book title" name="search.book" placeholder="Search ..." />
            </div>

        </div>
    </div>
    <div class="card-body p-0">
        @if ($books && $books->count() > 0)
            <table class="table">
                <thead class='bg-info'>
                    <tr>
                        <th>No</th>
                        <th style="width: 25%">Title</th>
                        <th>Author</th>
                        <th>Location</th>
                        <th>Level</th>
                        <th>Pages</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td> {{ $book->book_no }} </td>
                            <td> {{ $book->title }} </td>
                            <td>
                                @foreach ($book->authors as $author)
                                    {{ $author->name }}
                                @endforeach
                            </td>
                            <td> {{ $book->setting->name }} </td>
                            <td> {{ $book->level->name }} </td>
                            <td> {{ $book->pages }} </td>
                            <td>
                                <button class="btn btn-secondary btn-sm" wire:click='select'>Select</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-muted p-4 mb-0">No data to shown</p>
        @endif
    </div>
</div>
