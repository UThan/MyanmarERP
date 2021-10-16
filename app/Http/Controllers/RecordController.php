<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function allReservation()
    {
        $reservations = Reservation::paginate(20);
        return view('admin.allreservation', ['reservations' => $reservations]);
    }

    public function allDue()
    {
        return view('admin.alldue');
    }
}
