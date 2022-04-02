<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;

class Books implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $title = ['title','book no','genre', 'level', 'author', 'category', 'pages', 'audiences', 'main character gender', 'series', 'story location', 'book location',  'status'];    
    public $exports;
    public function collection()
    {
        $books = Book::all();
        $this->exports = collect();
        $this->exports->push($this->title);
        $books->each(function($book){

            $genres = ''; $audiences = '';
           
            foreach($book->genres as $genre){
                $genres .= $genre->name;                
            }

            foreach($book->audiences as $audience){
                $audiences .= $audience->name;                
            }
          
            
            $this->exports->push( [
                $book->title,
                $book->book_no,
                $genres,
                $book->level->name,
                $book->author,
                $book->category,
                $book->pages,
                $audiences,
                $book->main_character_gender,
                $book->series ? $book->series->name : 'null',
                $book->story_location ? $book->story_location->name : 'null',
                $book->book_location ? $book->book_location->name : 'null',
                $book->status ? $book->status->name : 'null',
            ]);           
        });
        return $this->exports;
    }
}
