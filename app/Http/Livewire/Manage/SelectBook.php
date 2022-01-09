<?php

namespace App\Http\Livewire\Manage;

use App\Helper\WithModals;
use App\Models\Book;
use App\Models\Category;
use App\Models\Level;
use App\Models\Location;
use App\Models\StoryLocation;
use Livewire\Component;

class SelectBook extends Component
{
    use WithModals;
    public $search = [
        'category' => '',
        'booklocation' => '',
        'storylocation' => '',
        'level' => '',
        'book' => '',
    ];

    public $select = [];
    public $main_location,$sub_locations;

    public function render()
    {
        $main_locations = Location::where('main_location_id',0)->get();
        $storylocations = StoryLocation::all('id', 'name');
        $categories = Category::all('id', 'name');
        $levels = Level::all('id', 'name');
        $books = Book::when($this->search['level'], function ($query) {
            $query->where('level_id', $this->search['level']);
        })->when($this->search['storylocation'], function ($query) {
            $query->where('story_location_id', $this->search['storylocation']);            
        })->when($this->search['booklocation'], function ($query) {
            $query->where('book_location_id', $this->search['booklocation']);            
        })->when($this->search['category'], function ($query) {
            $query->where('category_id', $this->search['category']);
        })->when($this->search['book'], function ($query) {
            $query->where('title', 'like', '%' . $this->search['book'] . '%');
        })->take(5)->get();
        return view('livewire.manage.select-book', compact('categories', 'main_locations', 'storylocations', 'levels', 'books'));
    }

    public function bookSelected()
    {
       $this->emit('bookSelected',$this->select);
    }

    public function clearMember()
    {
        $this->emit('clearMember');
    }

    public function updatedMainLocation($id)
    {
        $this->sub_locations = Location::where('main_location_id',$id)->get();
    }
}
