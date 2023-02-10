<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_no', 'title', 'category', 'pages', 'author', 'main_character', 'book_status'
    ];
 
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function story_location()
    {
        return $this->belongsTo(StoryLocation::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function main_character()
    {
        return $this->belongsTo(MainCharacter::class);
    }

    public function book_location()
    {
        return $this->belongsTo(Institution::class);
    }
    
    
    public function book_status()
    {
        return $this->belongsTo(BookStatus::class);
    }

    public function audience()
    {
        return $this->belongsTo(Audience::class);
    }
}
