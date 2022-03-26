<?php

namespace App\Http\Livewire\Manage;

use App\Helper\WithData;
use App\Models\Book;
use App\Models\RentList;
use Carbon\Carbon;
use Livewire\Component;

class ConfirmBorrow extends Component
{
    use WithData;
    public $member, $books;
    

    public function render()
    {       
        return view('livewire.manage.confirm-borrow');
    }

    public function remove($id)
    {
        $this->selected = $this->selected->except(['id' => $id]);
    }

    

    public function borrow()
    {
            $record = new RentList;
            $record->member_id = $this->member->id;
            $record->rent_date = Carbon::today()->toDateString();  
            $record->due_date = Carbon::today()->addDay($this->rentduration)->toDateString();            
            $record->save(); 
            
            $record->books()->sync($this->books);            
           
  
            session()->flash('success', 'Book successfully rented');
            return redirect()->to('manage/borrow/list');
    }
}
