<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentList extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function rent_status()
    {
        return $this->belongsTo(RentStatus::class);
    }


    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}
