<?php

namespace App\Http\Livewire\Book;

use App\Exports\BooksExport;
use App\Helper\Helper;
use App\Helper\WithModals;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Level;
use Maatwebsite\Excel\Facades\Excel;

class Allbook extends Component
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
        'setting' => '',
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
        $book = Book::find($id);
        $book->delete();
        session()->flash('success', 'successfully deleted');
    }

    public function export()
    {
        return Excel::download(new BooksExport, 'users.xlsx');
    }

    public function render()
    {
        $settings = Helper::arrayForSelectInput(Setting::all('id', 'name'));
        $categories = Helper::arrayForSelectInput(Category::all('id', 'name'));
        $levels = Helper::arrayForSelectInput(Level::all('id', 'name'));
        $books = Book::when($this->search['level'], function ($query) {
            $query->where('level_id', $this->search['level']);
        })->when($this->search['setting'], function ($query) {
            $query->where('setting_id', $this->search['setting']);
        })->when($this->search['category'], function ($query) {
            $query->where('category_id', $this->search['category']);
        })->when($this->search['book'], function ($query) {
            $query->where('title', 'like', '%' . $this->search['book'] . '%');
        })->paginate($this->search['showonly']);
        return view('livewire.book.allbook', compact('categories', 'settings', 'levels', 'books'));
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
