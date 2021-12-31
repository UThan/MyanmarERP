<?php

namespace App\Http\Livewire\Book;

use App\Models\Location;
use App\Models\StoryLocation;
use App\Models\Level;
use App\Models\Genre;
use App\Models\Book;
use App\Helper\WithModals;
use Livewire\WithPagination;

use Livewire\Component;

class BookLocation extends Component
{
    use WithModals;
    use WithPagination;

    public $books;


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
        $story_locations = StoryLocation::all('id', 'name');
        $book_locations = Location::withCount('books')->paginate(5);          
        $genres = Genre::all('id', 'name');
        $levels = Level::all('id', 'name');          
        return view('livewire.book.book-location', compact('story_locations','book_locations', 'levels', 'genres'));
     
    }

    public function show($id){
        $this->books = Book::where('book_location_id',$id)->get();
    }
}
