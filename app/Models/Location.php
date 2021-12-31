<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    
    public function books()
    {
        return $this->hasMany(Book::class,'book_location_id');
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function sublocations(){
        return $this->hasMany(Location::class,'main_location_id');
    }

    public function parentlocation(){
        return $this->belongsTo(Location::class,'main_location_id');
    }
    
}
