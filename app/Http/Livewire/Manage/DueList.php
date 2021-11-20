<?php

namespace App\Http\Livewire\Manage;

use App\Models\RentList;
use Livewire\Component;

class DueList extends Component
{
    public function render()
    {
        $reservations = RentList::paginate(10);
        return view('livewire.manage.due-list', compact('reservations'));
    }
}
