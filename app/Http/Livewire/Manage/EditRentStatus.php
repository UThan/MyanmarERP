<?php

namespace App\Http\Livewire\Manage;

use App\Models\RentList;
use App\Models\RentStatus;
use Livewire\Component;

class EditRentStatus extends Component
{

    public $rentlist;
    public $listeners = ['showRentStatus' => 'bindData'];

    public $rules = [
        'rentlist.rent_status_id' => 'required',        
    ];

    public function render()
    {
        $rentstatuses = RentStatus::all('id', 'name');
        return view('livewire.manage.edit-rent-status',compact('rentstatuses'));
    }

    public function bindData($id)
    {
        $this->rentlist = RentList::find($id);
    }

    public function submit()
    {
        $this->rentlist->save();
        session()->flash('success', 'Successfully updated');
        return redirect()->to('/manage/borrow/list');
    }
}
