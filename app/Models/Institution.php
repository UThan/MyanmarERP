<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function books()
    {
        return $this->hasMany(Book::class,'book_location_id');
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function institution_type()
    {
        return $this->belongsTo(InstitutionType::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    
    
}
