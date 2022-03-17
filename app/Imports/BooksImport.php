<?php

namespace App\Imports;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Level;
use App\Models\Series;
use App\Models\StoryLocation;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class BooksImport implements OnEachRow, WithHeadingRow, SkipsEmptyRows
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


        $story_location = StoryLocation::firstOrCreate([
            'name' => $item['story_location']
        ]);

        $category = Category::firstOrCreate([
            'name' => $item['category']
        ]);

        $book = Book::firstOrNew(
            ['title' =>  $item['title']],
            [
                'book_no' => $item['no'],
                'copies_owned' => $item['total'],
                'copies_left' => $item['total'],
                'copies_lost' => 0,
                'book_location_id' => 0,
                'pages' =>  $item['pages'],
            ]
        );

        $book->level()->associate($level);
        $book->series()->associate($series);
        $book->story_location()->associate($story_location);
        $book->category()->associate($category);
        $book->save();

        $authors = explode(",", $item['author']);
        foreach ($authors as $bookauthor) {
            $author = Author::firstOrCreate([
                'name' => $bookauthor
            ]);
            if (!$book->authors->contains($author->id)) {
                $book->authors()->attach($author->id);
            }
        }

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
