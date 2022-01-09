<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Member;
use App\Models\RentList;
use Livewire\Component;

class Dashboard extends Component
{
    public $title = 'Dashboard';

    public function render()
    {
        $total_books = Book::count();
        $total_members = Member::count();
        $total_borrow_lists = RentList::count();
        return view('livewire.dashboard',compact('total_books','total_members','total_borrow_lists'));
    }
}
