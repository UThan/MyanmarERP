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

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function getJoinedDateAttribute(){
        return $this->created_at->format('d-M-Y');
    }
}
