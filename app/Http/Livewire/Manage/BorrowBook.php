<?php

namespace App\Http\Livewire\Manage;

use App\Models\Book;
use App\Models\Member;
use Livewire\Component;

class BorrowBook extends Component
{

    protected $listeners = ['memberSelected' => 'onMemberSelected', 'bookSelected' => 'onBookSelected', 'clearMember' => 'onClearMember', 'clearBooks'=> 'onClearBooks'];
    public $member = '';
    public $books = '';
    public function render()
    {
        return view('livewire.manage.borrow-book');
    }

    public function onMemberSelected($id)
    {
        $this->member = Member::find($id);
    }

    public function onBookSelected($ids)
    {
        $this->books = Book::find($ids);      
    }

    public function onClearMember()
    {
        $this->member = '';    
    }

    public function onClearBooks(){
        $this->books = '';
    }
}
