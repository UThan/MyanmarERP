
    <div class="card">
        <div class="card-header pt-4">
            <div class="row">
                <div class="col-md-2">
                    <x-form.select name="search.category" placeholder='By category' :models='$categories' />
                </div>
                <div class="col-md-2">
                    <x-form.select name="search.level" placeholder="Level" :models='$levels' />
                </div>
                <div class="col-md-2">
                    <x-form.select name="search.booklocation" placeholder="Book Location" >
                        @foreach ($booklocations as $location)
                                    <option value="{{$location->id}}">
                                        
                                        @isset($location->parentlocation)                                          
                                            {{$location->parentlocation->name}} /
                                        @endisset
                                        {{$location->name}} </option>
                                @endforeach
                    </x-form.select>
                </div>
                <div class="col-md-2">
                    <x-form.select name="search.storylocation" placeholder="Story Location" :models='$storylocations' />
                </div>
                <div class="col-md-3 offset-md-1">
                    <x-form.input type='search' name="search.book" placeholder="Enter title..." />
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
                                <td> 
                                    @if ($book->book_location)
                                    {{ $book->book_location->name }}
                                    @else
                                        Unknown
                                    @endif 
                                </td>
                                <td> {{ $book->level->name }} </td>
                                <td> {{ $book->pages }} </td>
                                <td style="width: 4rem; padding: 5px">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="{{ $book->id }}"  wire:model='select' value='{{$book->id}}'>
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
            <button class="btn btn-primary float-right" @if (!$select) disabled @endif wire:click='bookSelected'>Next</button>
            <button class="btn btn-secondary float-right mr-2"  wire:click='clearMember'>Back</button>
        </div>

        
    </div>

