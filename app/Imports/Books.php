<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Level;
use App\Models\Series;
use App\Models\StoryLocation;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class Books implements OnEachRow, WithHeadingRow, SkipsEmptyRows
{
    public function onRow(Row $row)
    {

        $item = $row->toArray();   

        $book = Book::firstOrNew(
            ['title' =>  $item['title']],
            [
                'book_no' => $item['no'],
                'copies_owned' => $item['total'],
                'copies_left' => $item['total'],
                'copies_lost' => 0,
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
        

        if($item['story_location']){
            $story_location = StoryLocation::firstOrCreate([
                'name' => $item['story_location']
            ]);
            
            $book->story_location()->associate($story_location);  
        }
                
        $book->save();        

        $genres = explode(",", $item['genre']);
        foreach ($genres as $bookgenre) {
            $genre = Genre::firstOrCreate([
                'name' => $bookgenre
            ]);
            if (!$book->genres->contains($genre->id)) {
                $book->genres()->attach($genre->id);
            }
        }        
    }
    
}
