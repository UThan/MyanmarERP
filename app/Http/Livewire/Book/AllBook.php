<?php

namespace App\Http\Livewire\Book;

use App\Exports\Books;
use App\Helper\WithData;
use App\Helper\WithModals;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Institution;
use App\Models\StoryLocation;
use App\Models\Level;
use App\Models\Series;
use App\Models\StoryRegion;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AllBook extends Component
{
    use WithModals;
    use WithPagination;
    use WithData;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['onDelete'];

    public $story_regions,$book_locations,$levels,$series,$genres;
    
    public $search = [
        'series' => '',
        'story_region' => '',
        'level' => '',
        'book' => '',
        'genre' => '',
        'maincharacter' => '',
        'category' => '',
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
        return Excel::download(new Books, 'Book List.xlsx');
    }

    public function render()
    {  
        $books = Book::when($this->search['genre'], function ($query) {
            $query->wherehas('genres', function($q) {
                $q->where('id', $this->search['genre']);
            });
        })->when($this->search['level'], function ($query) {
            $query->where('level_id', $this->search['level']);
        })->when($this->search['story_region'], function ($query) {
            $query->whereIn('story_location_id', StoryRegion::find($this->search['story_region'])->books->pluck('story_location_id'));
        })->when($this->search['series'], function ($query) {
            $query->where('series_id', $this->search['series']);
        })->when($this->search['maincharacter'], function ($query) {
            $query->where('main_character_gender', $this->search['maincharacter']);
        })->when($this->search['category'], function ($query) {
            $query->where('category', $this->search['category']);
        })->when($this->search['book'], function ($query) {
            $query->where('title', 'like', '%' . $this->search['book'] . '%');
        })->paginate('20');
        
        return view('livewire.book.all-book', compact('books'));
    }

    public function mount(){
        $this->story_regions = StoryRegion::all('id', 'name');
        $this->book_locations = Institution::all('id', 'name');  
        $this->levels = Level::all('id', 'name'); 
        $this->series = Series::all('id', 'name'); 
        $this->genres = Genre::all('id', 'name'); 
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
