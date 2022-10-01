<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryRegion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->hasManyThrough(Book::class,StoryLocation::class);
    }

    public function story_locations()
    {
        return $this->hasMany(StoryLocation::class);
    }

}
