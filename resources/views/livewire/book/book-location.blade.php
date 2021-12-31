<x-slot name="title">
    <x-admin-title title='Books' :dirs="['home' => 'home', 'book' => 'book']" />
</x-slot>

<div >
    <x-alert />

    <div class="row">
        <div class="col">
            <div class="card card-secondary">
                <div class="card-header pt-4">
                    <div class="row">                
                        
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    @if ($book_locations && $book_locations->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Location</th>
                                    <th>Total Book</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($book_locations as $location)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td> 
                                        <td style="width: 50%">{{ $location->name }} </td>
                                        <td>{{ $location->books_count }}</td>                                        
        
                                        <td>                                            
                                            <a href="#" wire:click="show({{$location->id}})"><i class="fa fa-angle-double-right text-muted" aria-hidden="true"></i></a>                                                  
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
        
                @if ($book_locations->hasPages())
                    <div class="card-footer pb-0">
                        {{ $book_locations->onEachSide(1)->links() }}
                    </div>
                @endif
            </div>
        </div>

        <div class="col">
            <div class="card card-secondary">
                <div class="card-header pt-4">
                    <div class="row">                
                        
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    @if ($books && $books->count() > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Genre</th>
                                    <th>Level</th>
                                    <th>StoryLocation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{$book->title}}</td>
                                        <td>
                                            @isset($book->genres)
                                                @foreach ($book->genres as $genre)
                                                    {{$genre->name}}
                                                @endforeach
                                            @endisset
                                        </td>
                                        <td>
                                            {{$book->level->name}}
                                        </td>  
                                        <td>
                                            {{$book->story_location->name}}
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
        
               
            </div>
        </div>
    </div>
</div>
