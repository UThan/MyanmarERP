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
        $borrowlists = RentList::latest()->paginate(10);
        return view('livewire.manage.borrow-list', compact('borrowlists'));
    }

    public function delete($id)
    {
        $this->confirmDelete($id);
    }

    public function onDelete($id)
    {
        RentList::destroy($id);
    }

    public function edit($id)
    {
        $this->emit('showEditBorrowList', $id);
        $this->openModal('modalEditBorrowList');
    }
}
