<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Region extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function location()
    {
        return $this->belongsTo(Institution::class);
    }

    public function books()
    {
        return $this->hasManyThrough(Book::class,Institution::class);
    }
}
