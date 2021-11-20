<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function member_status()
    {
        return $this->belongsTo(MemberStatus::class);
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class);
    }

    public function hostels()
    {
        return $this->belongsToMany(Hostel::class);
    }
}
