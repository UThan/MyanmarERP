<?php

namespace App\Http\Livewire\Book;

use App\Helper\Helper;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Level;
use App\Models\Series;
use App\Models\Setting;
use Livewire\Component;

class Addbook extends Component
{
    public $title = 'Addbook';

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
        'field.level' => 'required',
        'field.setting' => 'required',
        'field.series' => 'required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $validated = $this->validate();
        $book = new Book;

        $book->title = $validated['field']['title'];
        $book->copies_owned = $validated['field']['copies_owned'];
        $book->pages = $validated['field']['pages'];
        $book->book_no = $validated['field']['book_no'];
        $book->category_id = $validated['field']['category'];
        $book->level_id = $validated['field']['level'];
        $book->setting_id = $validated['field']['setting'];
        $book->series_id = $validated['field']['series'];
        $book->save();

        $book->authors()->attach($validated['field']['author']);
        $book->genres()->attach($validated['field']['genre']);
        session()->flash('success', 'New book is successfully added');
    }

    public function render()
    {
        $authors = Helper::arrayForSelectInput(Author::all('id', 'name'));
        $settings = Helper::arrayForSelectInput(Setting::all('id', 'name'));
        $series = Helper::arrayForSelectInput(Series::all('id', 'name'));
        $levels = Helper::arrayForSelectInput(Level::all('id', 'name'));
        $genres = Helper::arrayForSelectInput(Genre::all('id', 'name'));
        $categories  = Helper::arrayForSelectInput(Category::all('id', 'name'));
        return view('livewire.book.addbook', compact('categories', 'authors', 'settings', 'series', 'levels', 'genres'));
    }
}
