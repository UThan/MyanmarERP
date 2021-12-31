<?php

namespace App\Http\Livewire;

use App\Helper\WithModals;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Level;
use App\Models\Series;
use App\Models\StoryLocation;
use App\Imports\BooksImport;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\HeadingRowImport;
use Maatwebsite\Excel\Facades\Excel;

class Importbook extends Component
{
    use WithFileUploads;
    use WithModals;

    public $upload;
    public $text = 'Series';
    public $columns;
    private $totalSaved = 0;


    public function updatingUpload($value)
    {
        Validator::make(
            ['upload' => $value],
            ['upload' => 'required|mimes:xlsx,csv']
        )->validate();
    }

    public function import()
    {  
        Excel::import(new BooksImport, $this->upload);
        session()->flash('success', $this->totalSaved . ' record successfully added');
        return redirect()->to('/book');
    }


    public function render()
    {
        return view('livewire.importbook');
    }

    public function extractFieldsFromRow($row)
    {
        $attributes = collect($this->field)->except(['category'])
            ->mapWithKeys(function ($value, $key) use ($row) {  // 'level' => 2  
                return [$key => $row[$value]];                  //'level' => row['2'] 
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
            'story_location' => ['story_location', 'location'],
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

        $story_location = StoryLocation::where('name', '=', $book->get('story_location'))->first();
        if (!$story_location) {
            $story_location = StoryLocation::create([
                'name' => $book->get('story_location')
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
            $savebook->story_location()->associate($story_location);
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
            if (!$savebook->authors->contains($author->id)) {
                $savebook->authors()->attach($author->id);
            }
        }

        $genres = collect(explode(",", $book->get('genre')));
        foreach ($genres as $bookgenre) {
            $genre = Genre::where('name', '=', $bookgenre)->first();
            if (!$genre) {
                $genre = Genre::create([
                    'name' => $book->get('genre')
                ]);
            }
            if (!$savebook->genres->contains($genre->id)) {
                $savebook->genres()->attach($genre->id);
            }
        }


        $this->totalSaved++;
    }
}
