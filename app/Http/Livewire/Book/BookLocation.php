<?php

namespace App\Http\Livewire\Book;

use App\Models\Location;
use App\Models\StoryLocation;
use App\Models\Level;
use App\Models\Genre;
use App\Models\Book;
use App\Helper\WithModals;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

use Livewire\Component;

class BookLocation extends Component
{
    use WithModals;
    use WithPagination;

    public $details;


    protected $paginationTheme = 'bootstrap';
    public $record = [
        5 => '5 records',
        10 => '10 records',
        25 => '25 records',
        50 => '50 records',
    ];
    public $search = [
        'category' => '',
        'story_location' => '',
        'level' => '',
        'book' => '',
        'showonly' => '10',
    ];
    
    public function render()
    {          
        $locations = Location::where('main_location_id','!=',0)->get();  
        return view('livewire.book.book-location', compact('locations'));
    }

    public function show($location){
        $this->details = DB::table('books')                        
        ->join('book_genre','books.id','book_genre.book_id')
        ->join('genres','book_genre.genre_id','genres.id')
        ->join('locations','books.book_location_id','locations.id') 
        ->select(DB::raw('sum(copies_owned) as total'),'genres.name as genre')   
        ->where('locations.id',$location)             
        ->groupBy('genres.name')->get();
    }

 
}
