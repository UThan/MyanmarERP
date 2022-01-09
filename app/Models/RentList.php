<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentList extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(Book::class)->withPivot('feedback_id', 'rent_status_id', 'return_date');
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
