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

class Addbook extends Component
{
    public $title = 'Addbook';

    public Book $book;
    public $author_ids,$genre_ids;

    public $rules = [
        'book.title' => 'required:unique:Book',
        'book.pages' => 'required|integer|min:1',
        'book.book_no' => 'required|integer|min:1',
        'book.category_id' => 'required',
        'book.level_id' => 'required',
        'book.story_location_id' => 'required',
        'book.book_location_id' => 'required',
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
        $book_locations = Location::all();
        $series = Series::all('id', 'name');
        $levels = Level::all('id', 'name');        
        $genres = Genre::all('id', 'name');
        $categories = Category::all('id', 'name');
        return view('livewire.book.add-book', compact('categories', 'authors', 'story_locations','book_locations' ,'series', 'levels', 'genres'));
    }
}
