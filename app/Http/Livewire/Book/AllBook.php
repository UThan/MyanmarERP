<?php

namespace App\Http\Livewire\Book;

use App\Exports\BooksExport;
use App\Helper\WithModals;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use App\Models\StoryLocation;
use App\Models\Category;
use App\Models\Level;
use App\Models\Location;
use Maatwebsite\Excel\Facades\Excel;

class AllBook extends Component
{
    use WithModals;
    use WithPagination;


    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['onDelete'];
    public $record = [
        5 => '5 records',
        10 => '10 records',
        25 => '25 records',
        50 => '50 records',
    ];

    public $search = [
        'category' => '',
        'story_location' => '',
        'level' => '',
        'book' => '',
        'showonly' => '10',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function onDelete($id)
    {
        $book = Book::destroy($id);
        session()->flash('success', 'successfully deleted');
    }

    public function export()
    {
        return Excel::download(new BooksExport, 'users.xlsx');
    }

    public function render()
    {
        $story_locations = StoryLocation::all('id', 'name');
        $book_locations = Location::all('id', 'name');
        $categories = Category::all('id', 'name');
        $levels = Level::all('id', 'name');
        
        $books = Book::when($this->search['level'], function ($query) {
            $query->where('level_id', $this->search['level']);
        })->when($this->search['story_location'], function ($query) {
            $query->where('story_location_id', $this->search['story_location']);
        })->when($this->search['category'], function ($query) {
            $query->where('category_id', $this->search['category']);
        })->when($this->search['book'], function ($query) {
            $query->where('title', 'like', '%' . $this->search['book'] . '%');
        })->paginate($this->search['showonly']);
        
        return view('livewire.book.all-book', compact('categories', 'story_locations','book_locations', 'levels', 'books'));
    }

    public function edit($id)
    {
        $this->emit('showEdit', $id);
        $this->openModal('modalEdit');
    }

    public function delete($id)
    {
        $this->confirmDelete($id);
    }
}
