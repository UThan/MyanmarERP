<x-slot name="title">
    <x-admin-title title='Edit New Book' :dirs="['home' => 'home', 'book' => 'book']" />
</x-slot>

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <form wire:submit.prevent='submit'>               
        
            <div class="card-body">
        
                <div class="form-row">
                    <div class="col">
                        <x-form.input name="book.book_no" label="Book Number" type="number"
                            placeholder="Enter book number" />
                    </div>
                    <div class="col">
                        <x-form.input name="book.title" label="Title" placeholder="Enter book title" />
                    </div>                       
                    
                </div>

                <div class="form-row">
                    <div class="col">
                        <x-form.select :models='$levels' name="book.level_id" label="Level" placeholder="Select ..." />
                    </div> 
                    <div class="col">
                        <x-form.select :models='$genres' name="book.genre_id" label="Genre"
                            placeholder="Select ..."/>
                    </div>                        
                </div>

                <div class="form-row">
                    <div class="col">
                        <x-form.select :models='$story_locations' name="book.story_location_id" label="Location"
                            placeholder="Select ..." />
                    </div> 
                    <div class="col">
                        <x-form.select :models='$main_characters' name="book.main_character_id" label="Main Character"
                            placeholder="Select ..." />
                    </div>                       
                </div>

                <div class="form-row">
                    <div class="col">
                        <x-form.input name="book.author" label="Author" placeholder="Enter author name"  />
                    </div>                        
                    <div class="col">
                        <x-form.input name="book.pages" label="Pages" type="number" placeholder="Enter pages" />
                    </div>            
                </div> 

                <div class="form-row">
                    <div class="col">
                        <x-form.select :options='$categories' name="book.category" label="Category"
                            placeholder="Select ..." />
                    </div>
                    <div class="col">
                        <x-form.select :models='$series' name="book.series_id" label="Series"
                            placeholder="Select ..." />
                    </div>
                </div>

                <div class="form-row">                       
                    <div class="col">
                        <x-form.select :models='$book_locations' name="book.book_location_id" label="Book Location"
                            placeholder="Select ..." />
                    </div>
                    <div class="col">
                        <x-form.select :models='$audiences' name="book.audience_id" label="Audience"
                            placeholder="Select ..."/>
                    </div>
                </div>

                <div class="form-row">                       
                    <div class="col-6">
                        <x-form.select :models='$status' name="book.book_status_id" label="Current status"
                            placeholder="Select ..." />
                    </div>                        
                </div>
            </div>

            <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Save</button>
                </div>    
            </form>
        
        </div>
        
    </div>
</div>

