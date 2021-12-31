<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Level;
use App\Models\Series;
use App\Models\StoryLocation;
use App\Models\Location;

class Editbook extends Component
{
    public $book;
    public $genre_ids,$author_ids;
    public $listeners = ['showEdit' => 'bindData'];
   
    public $rules = [
        'book.title' => 'required:unique:Book',
        'book.pages' => 'required|integer|min:1',
        'book.book_no' => 'required|integer|min:1',
        'book.category_id' => 'required',
        'book.level_id' => 'required',
        'book.story_location_id' => 'required',
        'book.book_location_id' => '',
        'book.series_id' => 'required',
        'genre_ids' => 'required',
        'author_ids' => 'required',
    ];

    public function bindData($id)
    {
        $this->book = Book::find($id);  
        $this->author_ids = $this->book->authors->mapWithKeys(function ($item) {
            return [$item['id']];
        })->all();     
        $this->genre_ids = $this->book->genres->mapWithKeys(function ($item) {
            return [$item['id']];
        })->all();  
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
        return view('livewire.book.edit-book', compact('categories', 'authors', 'story_locations','book_locations','series', 'levels', 'genres'));
    }  
}
