<?php

namespace App\Http\Livewire\Manage;

use App\Helper\Helper;
use App\Helper\WithModals;
use App\Models\Book;
use App\Models\Category;
use App\Models\Level;
use App\Models\Setting;
use Livewire\Component;

class Borrowbook extends Component
{
    use WithModals;
    public $search = [
        'category' => '',
        'setting' => '',
        'level' => '',
        'book' => '',
    ];


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
        })->take(10)->get();
        return view('livewire.manage.borrowbook', compact('categories', 'settings', 'levels', 'books'));
    }

    public function select()
    {
        $this->openModal();
    }
}
