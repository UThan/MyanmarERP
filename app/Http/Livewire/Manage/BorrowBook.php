<?php

namespace App\Http\Livewire\Manage;

use App\Models\Book;
use App\Models\Member;
use Livewire\Component;

class BorrowBook extends Component
{

    protected $listeners = ['memberSelected', 'bookSelected', 'back'];
    public $member, $books;
    public $step = 1;
    public function render()
    {
        return view('livewire.manage.borrow-book');
    }

    public function memberSelected($id)
    {
        $this->member = Member::find($id);
        $this->step = 2;
    }

    public function bookSelected($ids)
    {
        $this->books = Book::find($ids);   
        $this->step = 3;   
    }

    public function back()
    {
        $this->step -- ;
    }

    
}
