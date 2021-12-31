<div>
    <form wire:submit.prevent='submit'>
        <div class="modal-header">
            <h5 class="mb-0"> Edit Book </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">

            <div class="form-row">
                <div class="col">
                    <x-form.input name="book.title" label="Title" placeholder="Enter book title" />
                </div>
                <div class="col">
                    <x-form.input name="book.pages" label="Pages" type="number" placeholder="Enter pages a in book" />
                </div>
                
            </div>

            <div class="form-row">
                <div class="col">
                    <x-form.input name="book.book_no" label="Book Number" type="number"
                        placeholder="Enter book number" />
                </div>
                <div class="col">
                    <x-form.select :models='$levels' name="book.level_id" label="Level" placeholder="Select level" />
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <x-form.select multiple :models='$authors' name="author_ids" label="Author Name"
                        placeholder="Enter author name" />
                </div>

                <div class="col">
                    <x-form.select :models='$genres' name="genre_ids" label="Genre" placeholder="Enter book genre"
                        multiple />
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <x-form.select :models='$categories' name="book.category_id" label="Category"
                        placeholder="Select category" />
                </div>
                
                <div class="col">
                    <x-form.select :models='$series' name="book.series_id" label="Series"
                        placeholder="Select series name" />
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <x-form.select :models='$story_locations' name="book.story_location_id" label="Story Location"
                        placeholder="Select story_location" />
                </div>
                
                <div class="col">
                    <x-form.select name="book.book_location_id" label="Book Location"
                        placeholder="Select category" >
                        @foreach ($book_locations as $location)
                                    <option value="{{$location->id}}">
                                        
                                        @isset($location->parentlocation)                                          
                                            {{$location->parentlocation->name}} /
                                        @endisset
                                        {{$location->name}} </option>
                                @endforeach
                    </x-form.select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
