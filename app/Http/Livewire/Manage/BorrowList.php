<?php

namespace App\Http\Livewire\Manage;

use App\Helper\WithModals;
use App\Models\Book;
use App\Models\RentList;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class BorrowList extends Component
{
    use WithModals;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['onDelete'];
    public $booklists,$rent_id;
    

    public function render()
    {
        $rentlists = RentList::withCount('books')->paginate(5);
        return view('livewire.manage.borrow-list', compact('rentlists'));
    }

    public function deleteList($id)
    {
        $this->booklists = '';
        $this->confirmDelete($id);        
    }

    public function deletebook($id)
    {
        $rentlist= RentList::find($this->rent_id); 
        $rentlist->books()->detach($id);
        $book = Book::find($id);
        $book->increment('copies_left');   
        $book->save();
        $this->booklists = $rentlist->books;
    }

    public function onDelete($id)
    {        
        $rentlist = RentList::find($id);
        $rentlist->books->each(function ($book)
        {
          $book->increment('copies_left') ;
          $book->save();
        });
        $rentlist->delete();
        
    }

    public function edit($id)
    {
        $this->emit('showRentStatus', $id);
        $this->openModal('modalRentStatus');
    }
    
    public function show($rent_id){
        $this->rent_id = $rent_id;
        $this->booklists = RentList::find($rent_id)->books;
    }

    public function return($id)
    {
        $rentlist = RentList::find($this->rent_id);
        $rentlist->books()
        ->syncWithoutDetaching([
            $id => ['return_date'=> Carbon::today()->toDateString(),
                    'rent_status_id' => 2]]);
                    
        $book = Book::find($id);
        $book->increment('copies_left');   
        $book->save();
        $this->booklists = $rentlist->books;
        
    }
}
