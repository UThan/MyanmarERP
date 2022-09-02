<?php

namespace App\Http\Livewire\Manage;

use App\Helper\WithData;
use App\Helper\WithModals;
use App\Models\Book;
use App\Models\Category;
use App\Models\Institution;
use App\Models\Level;
use App\Models\Location;
use App\Models\StoryLocation;
use Livewire\Component;

class SelectBook extends Component
{
    use WithModals;
    use WithData;

    public $search = [
        'category' => '',
        'level' => '',
        'booklocation' => '',
        'storylocation' => '',
        'book' => '',
    ];

    public $selectedbooks = [];
    public $levels, $institutions, $storylocations;

    public function mount()
    {
        $this->levels = Level::all('id','name');
        $this->institutions = Institution::all('id','name');
        $this->storylocations = StoryLocation::all('id','name');
    }

    public function render()
    {
        $books = Book::when($this->search['level'], function ($query) {
            $query->where('level_id', $this->search['level']);
        })->when($this->search['storylocation'], function ($query) {
            $query->where('story_location_id', $this->search['storylocation']);            
        })->when($this->search['booklocation'], function ($query) {
            $query->where('book_location_id', $this->search['booklocation']);            
        })->when($this->search['category'], function ($query) {
            $query->where('category', $this->search['category']);
        })->when($this->search['book'], function ($query) {
            $query->where('title', 'like', '%' . $this->search['book'] . '%');
        })->take(5)->get();
        return view('livewire.manage.select-book', compact('books'));
    }    
    
    public function selectbook()
    {
        $this->emit('bookSelected', $this->selectedbooks);
    }
}
