<?php

namespace App\Http\Livewire\Setting;

use App\Helper\WithModals;
use App\Models\Series;
use App\Models\Genre;
use App\Models\Author;
use App\Models\StoryLocation;
use Livewire\Component;
use Livewire\WithPagination;

class BookSetting extends Component
{
    use WithPagination;
    use WithModals;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['onDelete'];
    public $key ;


    public function render()
    {
        $locations = StoryLocation::select('id', 'name')->withCount('books')->paginate(5, ['*'], 'location');
        $authors = Author::select('id', 'name')->withCount('books')->paginate(5, ['*'], 'author');
        $genres = Genre::select('id', 'name')->withCount('books')->paginate(5, ['*'], 'genre');
        $series = Series::select('id', 'name')->withCount('books')->paginate(5, ['*'], 'menu');

        return view('livewire.setting.book-setting', compact('locations', 'authors', 'genres', 'series'));
    }


    public function deleteGenre($id)
    {
        $this->key = Genre::class ;
        $this->confirmDelete($id);
    }

    public function deleteSeries($id)
    {
        $this->key = Series::class ;
        $this->confirmDelete($id);
    }

    public function deleteStoryLocation($id)
    {
        $this->key = StoryLocation::class ;
        $this->confirmDelete($id);
    }

    public function deleteAuthor($id)
    {
        $this->key = Author::class ;
        $this->confirmDelete($id);
    }


    public function onDelete($id)
    {
        $this->key::destroy($id);
        session()->flash('success', 'Delete success');
        return redirect()->to('/setting/book');
    }

}
