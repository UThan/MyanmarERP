<x-slot name="title">
    <x-admin-title title='Books' :dirs="['home' => 'home', 'book' => 'book']" />
</x-slot>

<div >
    <x-alert />
    <div class="row">
        <div class="col-lg-4 col-md-8 ">
            <a href="{{route('addbook')}}" class="btn btn-primary mb-2">New <i
                class="fa fa-plus ml-2" aria-hidden="true"></i></a>
            <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#modalImport">Import <i
                class="fa fa-file-import ml-2" aria-hidden="true"></i></a>
            <a href="#" class="btn btn-secondary mb-2" wire:click.prevent='export'>Download <i class="fa fa-download ml-2"
                aria-hidden="true"></i></a>
        </div>       

        <div class="offset-lg-6 col-lg-2 col-md-8 ">
                <x-form.input type='search' placeholder="Book title" name="search.book" placeholder="Search title" />
        </div> 
    </div>

    

    
    <x-modal id="modalImport">
        @livewire('importbook')
    </x-modal>

    
    
   

    <div class="card card-dark">
        <div class="card-header pt-4">
            <div class="row"> 
                <div class="col-lg-2 col-md-4">
                    <x-form.select name="search.level" placeholder="Level" :models='$levels' />
                </div>
                <div class="col-lg-2 col-md-4">
                    <x-form.select name="search.genre" placeholder="Genre" :models="$genres" />
                </div>
                <div class="col-lg-2 col-md-4">
                    <x-form.select name="search.story_location" placeholder="Location" :models='$story_locations' />
                </div>
                <div class="col-lg-2 col-md-8 ">
                    <x-form.select placeholder="Main Character" name="search.main_character" :models="$main_characters"  />
                </div>
                <div class="col-lg-2 col-md-4">
                    <x-form.select name="search.series" placeholder="Series" :models="$series" />
                </div>   
                <div class="col-lg-2 col-md-4">
                    <x-form.select name="search.category" placeholder="Category" :options="$categories" />
                </div>                  
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            @if ($books && $books->count() > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th style="width: 23%">Title</th>
                            <th>Genre</th>
                            <th>Location</th>
                            <th>Main Character</th>
                            <th>Pages</th>
                            <th>Author</th>
                            <th>Series</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->level->name }}_{{ $book->category == 'cr' ? strtoupper($book->category) : ''}}{{ $book->book_no }}</td>                                
                                <td>{{ $book->title }}</td>
                                <td>
                                    {{ $book->genre ? $book->genre->name : 'Unknown' }}
                                </td>
                                <td>
                                    {{ $book->story_location ? $book->story_location->name : 'Unknown' }}
                                </td>      
                                <td>
                                    {{ $book->main_character ? $book->main_character->name : 'Unknown' }}
                                </td>                                                          
                                <td>{{ $book->pages ? $book->pages : 'Unknown' }}</td>
                                <td>{{ $book->author ? $book->author : 'Unknown' }} </td>                                         
                                <td data-toggle="tooltip" title="{{ $book->series->description }}"> {{ $book->series->name}} </td>                              
 
                                <td>
                                    
                                    <a href="#" class="text-muted" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span><i class="fas fa-ellipsis-v"></i>
                                    </a>

                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="{{route('editbook', $book->id)}}">
                                               <i class="fas fa-edit mr-2 "></i> Edit</a>
                                            <a class="dropdown-item text-danger" href="#"  wire:click.prevent='delete({{ $book->id }})'>
                                               <i class="fas fa-trash mr-2"></i> Delete</a>
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
        <!-- /.card-body -->

        @if ($books->hasPages())
            <div class="card-footer pb-0">
                {{ $books->onEachSide(1)->links() }}
            </div>
        @endif
    </div>
</div>


