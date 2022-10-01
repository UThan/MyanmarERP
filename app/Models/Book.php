<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_no', 'title', 'category', 'copies_left', 'copies_owned', 'copies_lost', 'pages', 'author', 'main_character_gender', 'status_id'
    ];
 
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
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

    public function book_location()
    {
        return $this->belongsTo(Institution::class);
    }
    
    
    public function book_status()
    {
        return $this->belongsTo(BookStatus::class);
    }

    public function audiences()
    {
        return $this->belongsToMany(Audience::class,'book_audience');
    }
}
