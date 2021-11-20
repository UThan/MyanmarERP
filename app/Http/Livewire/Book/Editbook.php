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
        'field.author' => 'author',
        'field.copies_owned' => 'book copies',
        'field.pages' => 'pages',
        'field.book_no' => 'book number',
        'field.genre' => 'genre',
        'field.category' => 'category',
        'field.level' => 'level',
        'field.setting' => 'setting',
        'field.serires' => 'serires',
    ];



    public $field = [
        'title' => '',
        'author' => [],
        'copies_owned' => '',
        'pages' => '',
        'book_no' => '',
        'genre' => [],
        'category' => '',
        'level' => '',
        'setting' => '',
        'series' => '',
    ];

    public $rules = [
        'field.title' => 'required:unique:Book',
        'field.author' => 'required',
        'field.copies_owned' => 'required|integer|min:1',
        'field.pages' => 'required|integer|min:1',
        'field.book_no' => 'required|integer|min:1',
        'field.genre' => 'required',
        'field.category' => 'required',
        'book.level_id' => 'required',
        'field.setting' => 'required',
        'field.series' => 'required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function bindData($id)
    {
        $book = Book::find($id);
        $this->field['title'] = $book->title;
        $this->field['author'] = $book->authors->mapWithKeys(function ($item) {
            return [$item['id']];
        })->all();
        $this->field['copies_owned'] = $book->copies_owned;
        $this->field['pages'] = $book->pages;
        $this->field['book_no'] = $book->book_no;
        $this->field['category'] = $book->category->id;
        $this->field['genre'] = $book->genres->mapWithKeys(function ($item, $key) {
            return [$item['id']];
        })->all();
        $this->field['level'] = $book->level->id;
        $this->field['setting'] = $book->setting->id;
        $this->field['series'] = $book->series->id;
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
