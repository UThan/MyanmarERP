<?php

namespace App\Http\Livewire\Manage;

use App\Helper\WithModals;
use App\Models\RentList;
use Livewire\Component;

class Borrowlist extends Component
{
    use WithModals;
    protected $listeners = ['onDelete'];
    public function render()
    {
        $reservations = RentList::paginate(10);
        return view('livewire.manage.borrowlist', compact('reservations'));
    }

    public function confirm()
    {
        $this->confirmDelete();
    }

    public function onDelete()
    {
    }
}
