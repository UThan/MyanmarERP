<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;

class Books implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $title = ['Book No','Level','Title', 'Genre', 'Location', 'Main Character', 'Pages', 'Author', 'Series', 'Category', 'Book Location', 'Audience', 'Book Status'];    
    public $exports;
    public function collection()
    {
        $books = Book::all();
        $this->exports = collect();
        $this->exports->push($this->title);
        $books->each(function($book){
                               
            $this->exports->push( [
                
                $book->book_no,
                $book->level->name ? $book->level->name : 'Unknown',
                $book->title? $book->title : 'Unknown',
                $book->genre? $book->genre->name : 'Unknown',
                $book->story_location? $book->story_location->name : 'Unknown',
                $book->main_character? $book->main_character->name : 'Unknown',                
                $book->pages? $book->pages : 'Unknown',
                $book->author? $book->author : 'Unknown',
                $book->series? $book->series->name : 'Unknown',
                $book->category? $book->category : 'Unknown',
                $book->book_location ? $book->book_location->name : 'Unknown',
                $book->audience ? $book->audience->name : 'Unknown',
                $book->book_status ? $book->book_status->name : 'Unknown',
            ]);           
        });
        return $this->exports;
    }
}
