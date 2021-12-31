<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberStatus extends Model
{
    use HasFactory;

    public function getStatusAttribute()
    {
        switch ($this->name) {
            case 'Active':
                return "success";
                break;  
            case 'Deactived':
                return "secondary";
                break;          
            default:
                return "warning";
                break;
        }
    }
}
