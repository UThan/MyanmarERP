<?php

namespace App\Http\Livewire\Book;


use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Level;
use App\Models\Series;
use App\Models\StoryLocation;
use App\Models\Location;
use Livewire\Component;

class AddBook extends Component
{
    public $title = 'Addbook';

    public Book $book;
    public $author_ids ,$genre_ids, $book_location, $sub_locations;

    public $rules = [
        'book.title' => 'required:unique:Book',
        'book.pages' => 'required|integer|min:1',
        'book.book_no' => 'required|integer|min:1',
        'book.category_id' => 'required',
        'book.level_id' => 'required',
        'book_location' => '',
        'book.book_location_id' => '',
        'book.story_location_id' => 'required',
        'book.series_id' => 'required',
        'genre_ids' => 'required',
        'author_ids' => 'required',
    ];

    public function mount(){
        $this->book = new Book();
    }
   

    public function submit(){
        $this->validate();        
        $this->book->save();
        $this->book->authors()->sync($this->author_ids);
        $this->book->genres()->sync($this->genre_ids);
        session()->flash('success', 'Successfully updated');
        return redirect()->to('/book');
    }

    public function render()
    {
        $authors = Author::all('id', 'name');
        $story_locations = StoryLocation::all('id', 'name');
        $main_locations = Location::where('main_location_id','0')->get();
        $series = Series::all('id', 'name');
        $levels = Level::all('id', 'name');        
        $genres = Genre::all('id', 'name');
        $categories = Category::all('id', 'name');
        return view('livewire.book.add-book', compact('categories', 'authors', 'story_locations','main_locations' ,'series', 'levels', 'genres'));
    }

    public function updatedBookLocation($id)
    {
        
            $this->sub_locations = Location::where('main_location_id',$id)->get();
       
    }

    public function updatedSubLocation($id)
    {
        $this->book->book_location_id =$id;
    }
}
