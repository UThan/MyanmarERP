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
        $borrowlists = RentList::paginate(10);
        return view('livewire.manage.borrowlist', compact('borrowlists'));
    }

    public function confirm($id)
    {
        $this->confirmDelete($id);
    }

    public function onDelete($id)
    {
        RentList::destroy($id);
    }
}
