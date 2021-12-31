<?php

namespace App\Http\Livewire\Manage;

use App\Models\RentList;
use Carbon\Carbon;
use Livewire\Component;

class ConfirmBorrow extends Component
{
    public $member, $selected;

    public function mount($books)
    {
        $this->selected = $books;
    }

    public function render()
    {
        $selectedbooks = $this->selected;
        return view('livewire.manage.confirm-borrow', compact('selectedbooks'));
    }

    public function remove($id)
    {
        $this->selected = $this->selected->except(['id' => $id]);
    }

    public function back()
    {
        $this->emit('clearBooks');
    }

    public function borrow()
    {

        foreach ($this->selected as $book) {
            $record = new RentList;
            $record->book_id = $book->id;
            $record->member_id = $this->member->id;
            $record->reservation_date = Carbon::today()->toDateString(); 
            $record->rent_date = Carbon::today()->toDateString();  
            $record->due_date = Carbon::today()->addDay(14)->toDateString();
            $record->rent_status_id = 1;
            $record->save();            
        }

        session()->flash('success', 'Book successfully rented');
        return redirect()->to('manage/borrow/list');
    }
}
