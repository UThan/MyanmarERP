<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\Level;
use App\Models\Genre;
use App\Models\StoryLocation;
use App\Models\MainCharacter;
use App\Models\Series;
use App\Models\BookLocation;
use App\Models\Audience;
use App\Models\BookStatus;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class Books implements OnEachRow, WithHeadingRow, SkipsEmptyRows
{

    public $story_region;
    public function onRow(Row $row)
    {

        $item = $row->toArray();   
        $book = Book::firstOrNew(
            ['title' =>  $item['title']],
            [
                'book_no' => $item['book_no'],
                'category' => $item['category'],
                'author' => $item['author'],
                'book_location_id' => 0,
                'pages' =>  $item['pages'],
            ]
        );

        if($item['level']){
            $level = Level::firstOrCreate([
                'name' => $item['level']
            ]);
            $book->level()->associate($level);
        }
        
        if($item['series']){
            $series = Series::firstOrCreate([
                'name' => $item['series']
            ]);
            $book->series()->associate($series);
        }
        
        if($item['main_character']){
            $maincharacter = MainCharacter::firstOrCreate([
                'name' => $item['main_character']
            ]);
            $book->main_character()->associate($maincharacter);
        }

        if($item['location']){      
             $story_location = StoryLocation::firstOrCreate([
                'name' => $item['location'],
            ]);          
            
            $book->story_location()->associate($story_location);  
        }
      

        if($item['audience']){
            $audience = Audience::firstOrCreate([
                'name' => $item['audience']
            ]);
            $book->audience()->associate($audience);
        }

        if($item['genre']){
            $genre = Genre::firstOrCreate([
                'name' => $item['genre']
            ]);
            $book->genre()->associate($genre);
        }

        if($item['book_status']){
            $book_status = Genre::firstOrCreate([
                'name' => $item['book_status']
            ]);
            $book->book_status()->associate($book_status);
        }

                       
        $book->save();       

      
    }
    
}
