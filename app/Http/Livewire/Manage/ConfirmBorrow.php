<?php

namespace App\Http\Livewire\Manage;

use App\Models\Book;
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
            $record = new RentList;
            $record->member_id = $this->member->id;
            $record->reservation_date = Carbon::today()->toDateString(); 
            $record->rent_date = Carbon::today()->toDateString();  
            $record->due_date = Carbon::today()->addDay(14)->toDateString();            
            $record->save(); 
            foreach ($this->selected as $book) {
                $record->books()->attach($book,['rent_status_id' => 1]);  
            }
           
            foreach ($this->selected as $book) {
                $book->decrement('copies_left');   
                $book->save();             
            }
            
            
        

        session()->flash('success', 'Book successfully rented');
        return redirect()->to('manage/borrow/list');
    }
}
