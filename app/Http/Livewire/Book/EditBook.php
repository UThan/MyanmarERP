<?php

namespace App\Http\Livewire\Book;

use App\Helper\WithData;
use App\Models\Audience;
use Livewire\Component;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Genre;
use App\Models\Level;
use App\Models\Series;
use App\Models\StoryLocation;


class Editbook extends Component
{
    use WithData;
    public $title = 'Addbook';

    public Book $book;
    public $genre_id,$audience_id;  //Multiple ids
    public $series,$levels,$story_locations, $book_locations, $book_status, $genres, $audiences;

    public $rules = [
        'book.book_no' => 'required|integer|min:1',
        'book.title' => 'required|unique:Book',
        'book.category' => 'required',
        'book.pages' => 'required|integer|min:1',
        'book.author' => 'required',        
        'book.level_id' => 'required',
        'book.story_location_id' => 'required',
        'book.series_id' => 'required',
        'book.main_character_gender' => 'required',
        'book.book_status_id' => 'required',        
    ];
 
    public function submit(){  
        $this->book->save();
        session()->flash('success', 'Successfully Updated');
        return redirect()->to('/book');
    }

    public function render()
    {                      
        return view('livewire.book.edit-book');
    }

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->series = Series::all('id', 'name');
        $this->levels = Level::all('id', 'name');        
        $this->genres = Genre::all('id', 'name');
        $this->audiences = Audience::all('id', 'name');
        $this->status = BookStatus::all('id', 'name');
        $this->story_locations = StoryLocation::all('id', 'name'); 
    }
}
