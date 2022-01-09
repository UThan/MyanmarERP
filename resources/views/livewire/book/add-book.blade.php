<x-slot name="title">
    <x-admin-title title='Add New Book' :dirs="['home' => 'home', 'book' => 'book','add' => 'addbook']" />
</x-slot>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <form wire:submit.prevent='submit'>
               
        
                <div class="card-body">
        
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
                                placeholder="Enter author name"  />
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
                            <x-form.select name="book_location" :models='$main_locations' label="Book Location"
                                placeholder="Select category" >                               
                            </x-form.select>
                            @if($sub_locations)
                                <x-form.select name="book.book_location_id" :models='$sub_locations'
                                placeholder="Select category" >                               
                            </x-form.select>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                </div>
            </form>
        
        </div>
        
    </div>
</div>

