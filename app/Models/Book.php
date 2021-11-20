<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
