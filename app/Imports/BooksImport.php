<?php

namespace App\Imports;

use App\Models\Author;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Level;
use App\Models\Series;
use App\Models\Setting;

class BooksImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {

        $item = $row->toArray();    
         
        
        $level = Level::firstOrCreate([
            'name' => $item['level']
        ]);

        $series = Series::firstOrCreate([
            'name' => $item['series']
        ]);

       
        $setting = Setting::firstOrCreate([
            'name' => $item['setting']
        ]);
         
        $category = Category::firstOrCreate([
            'name' => $item['category']
        ]);
        
        $book = Book::firstOrNew(
            [ 'title' =>  $item['title']  ],
            [ 
                'book_no' => $item['no'], 
                'pages' => 0,              
                'copies_owned' => $item['total'], 
                'copies_left' => $item['total'], 
                'copies_lost' => 0, 
            ]
        );

        $book->level()->associate($level);
        $book->series()->associate($series);
        $book->setting()->associate($setting);
        $book->category()->associate($category);
        $book->save();

        $authors = explode(",", $item['author']);
        foreach ($authors as $bookauthor) {
            $author = Author::firstOrCreate([
                'name' => $item['author']
            ]);
            if (!$book->authors->contains($author->id)) {
                $book->authors()->attach($author->id);
            }
        }

        $genres = explode(",", $item['genre']);
        foreach ($genres as $bookgenre) {
            $genre = Genre::firstOrCreate([
                'name' => $item['genre']
            ]);
            if (!$book->genres->contains($genre->id)) {
                $book->genres()->attach($genre->id);
            }
        }
        
    }
}
