<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCharacter extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'name'
    ];

    public function Books(){
        return $this->belongsToMany(Book::class);
    }

}
