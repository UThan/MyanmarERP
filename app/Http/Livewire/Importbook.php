<?php

namespace App\Http\Livewire;

use App\Helper\Csv;
use App\Helper\WithModals;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Level;
use App\Models\Series;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Importbook extends Component
{
    use WithFileUploads;
    use WithModals;

    public $upload;
    public $text = 'Series';
    public $field = [
        'level' => '',
        'no' => '',
        'series' => '',
        'title' => '',
        'author' => '',
        'genre' => '',
        'setting' => '',
        'pages' => '',
        'total' => '',
        'category' => ''
    ];

    public $columns;
    private $totalSaved = 0;

    protected $rules = [
        'field.level' => 'required',
        'field.no' => 'required',
        'field.series' => 'required',
        'field.title' => 'required',
        'field.author' => 'required',
        'field.genre' => 'required',
        'field.setting' => 'required',
        'field.pages' => 'required',
        'field.total' => 'required',
        'field.category' => 'required',
    ];

    protected $validationAttributes  = [
        'field.level' => 'level',
        'field.no' => 'no',
        'field.series' => 'series',
        'field.title' => 'title',
        'field.author' => 'author',
        'field.genre' => 'genre',
        'field.setting' => 'setting',
        'field.pages' => 'pages',
        'field.total' => 'total',
        'field.category' => 'category',
    ];

    public function updatingUpload($value)
    {
        Validator::make(
            ['upload' => $value],
            ['upload' => 'required|mimes:txt,csv']
        )->validate();
    }



    public function import()
    {
        $this->validate();
        Csv::from($this->upload)->eachRow(function ($row) {
            if ($this->extractFieldsFromRow($row)->filter()->isEmpty()) return;   //Skip if the row is empty
            $book =  $this->extractFieldsFromRow($row);
            $this->saveRecord($book);
        });
        session()->flash('success', $this->totalSaved . ' record successfully added');
        return redirect()->to('/book');
    }

    public function updatedUpload()
    {
        $this->columns = Csv::from($this->upload)->columns();
        $this->guessField();
    }

    public function render()
    {
        return view('livewire.importbook');
    }

    public function extractFieldsFromRow($row)
    {
        $attributes = collect($this->field)->except(['category'])
            ->mapWithKeys(function ($heading, $field) use ($row) {
                return [$field => $row[$heading]];
            });

        return $attributes;
    }

    public function guessField()
    {
        $guesses = [
            'level' => ['level', 'english'],
            'no' => ['no', 'number'],
            'series' => ['series'],
            'title' => ['title', 'name'],
            'author' => ['author'],
            'genre' => ['genre', 'price'],
            'setting' => ['setting', 'location'],
            'pages' => ['page', 'pages'],
            'total' => ['no of copy', 'total'],
        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn ($options) => in_array(strtolower($column), $options));

            if ($match) $this->field[$match] = $column;
        }
    }

    public function saveRecord($book)
    {
        $level = Level::where('name', '=', $book->get('level'))->first();
        if (!$level) {
            $level = Level::create([
                'name' => $book->get('level')
            ]);
        }

        $series = Series::where('name', '=', $book->get('series'))->first();
        if (!$series) {
            $series = Series::create([
                'name' => $book->get('series')
            ]);
        }

        $setting = Setting::where('name', '=', $book->get('setting'))->first();
        if (!$setting) {
            $setting = Setting::create([
                'name' => $book->get('setting')
            ]);
        }

        $savebook = Book::where('title', '=', $book->get('title'))->first();
        if (!$savebook) {
            $savebook = new Book;
            $savebook->title = $book->get('title');
            $savebook->book_no = $book->get('no');
            $savebook->pages = $book->get('pages');
            $savebook->category_id =  $this->field['category'];
            $savebook->copies_owned = $book->get('total');
            $savebook->copies_left = $book->get('total');
            $savebook->copies_lost = 0;

            $savebook->level()->associate($level);
            $savebook->series()->associate($series);
            $savebook->setting()->associate($setting);

            $savebook->save();
        }

        $authors = collect(explode(",", $book->get('author')));
        foreach ($authors as $bookauthor) {
            $author = Author::where('name', '=', $bookauthor)->first();
            if (!$author) {
                $author = Author::create([
                    'name' => $book->get('author')
                ]);
            }
            $savebook->authors()->attach($author->id);
        }

        $genres = collect(explode(",", $book->get('genre')));
        foreach ($genres as $bookgenre) {
            $genre = Genre::where('name', '=', $bookgenre)->first();
            if (!$genre) {
                $genre = Genre::create([
                    'name' => $book->get('genre')
                ]);
            }
            $savebook->genres()->attach($genre->id);
        }


        $this->totalSaved++;
    }
}
