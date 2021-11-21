<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Helper\Helper;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Level;
use App\Models\Series;
use App\Models\Setting;

class Editbook extends Component
{
    public $book;
    public $listeners = ['showEdit' => 'bindData'];
    public $validationAttributes =  [
        'field.title' => 'title',
        'field.author_id' => 'author_id',
        'field.copies_owned' => 'book copies',
        'field.pages' => 'pages',
        'field.book_no' => 'book number',
        'field.genre_id' => 'genre_id',
        'field.category_id' => 'category_id',
        'field.level_id' => '',
        'field.setting_id' => 'setting_id',
        'field.serires' => 'serires',
    ];

    public $field = [
        'title' => '',
        'author_id' => [],
        'copies_owned' => '',
        'pages' => '',
        'book_no' => '',
        'genre_id' => [],
        'category_id' => '',
        'level_id' => '',
        'setting_id' => '',
        'series_id' => '',
    ];

    public $rules = [
        'field.title' => 'required:unique:Book',
        'field.author_id' => 'required',
        'field.copies_owned' => 'required|integer|min:1',
        'field.pages' => 'required|integer|min:1',
        'field.book_no' => 'required|integer|min:1',
        'field.genre_id' => 'required',
        'field.category_id' => 'required',
        'field.level_id' => 'required',
        'field.setting_id' => 'required',
        'field.series_id' => 'required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);

    }

    public function bindData($id)
    {
        $book = Book::find($id);
        $this->field['title'] = $book->title;
        $this->field['author_id'] = $book->authors->mapWithKeys(function ($item) {
            return [$item['id']];
        })->all();
        $this->field['copies_owned'] = $book->copies_owned;
        $this->field['pages'] = $book->pages;
        $this->field['book_no'] = $book->book_no;
        $this->field['category_id'] = $book->category->id;
        $this->field['genre_id'] = $book->genres->mapWithKeys(function ($item, $key) {
            return [$item['id']];
        })->all();
        $this->field['level_id'] = $book->level->id;       
        $this->field['setting_id'] = $book->setting->id;
        $this->field['series_id'] = $book->series->id;
    }

    public function render()
    {
        $authors = Helper::arrayForSelectInput(Author::all('id', 'name'));
        $settings = Helper::arrayForSelectInput(Setting::all('id', 'name'));
        $series = Helper::arrayForSelectInput(Series::all('id', 'name'));
        $levels = Helper::arrayForSelectInput(Level::all('id', 'name'));
        $genres = Helper::arrayForSelectInput(Genre::all('id', 'name'));
        $categories = Helper::arrayForSelectInput(Category::all('id', 'name'));
        return view('livewire.book.editbook', compact('categories', 'authors', 'settings', 'series', 'levels', 'genres'));
    }

    public function submit()
    {        
        session()->flash('success', 'Successfully updated');
        return redirect()->to('/book');
    }
}
