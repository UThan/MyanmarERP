<?php

namespace App\Http\Livewire\Manage;

use App\Models\RentList;
use Livewire\Component;

class ReserveBook extends Component
{
    public $title = 'Reservation';
    public function render()
    {
        $reservations = RentList::paginate(10);
        return view('livewire.manage.reserve-book', compact('reservations'));
    }
}
