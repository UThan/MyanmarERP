<?php

namespace App\Http\Livewire\Setting;

use App\Helper\WithModals;
use App\Models\Series;
use App\Models\Setting;
use App\Models\Genre;
use App\Models\Author;
use Livewire\Component;
use Livewire\WithPagination;

class BookSetting extends Component
{
    use WithPagination;
    use WithModals;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['onDelete'];


    public function render()
    {
        $settings = Setting::select('id', 'name')->withCount('books')->paginate(5, ['*'], 'setting');
        $authors = Author::select('id', 'name')->withCount('books')->paginate(5, ['*'], 'author');
        $genres = Genre::select('id', 'name')->withCount('books')->paginate(5, ['*'], 'genre');
        $series = Series::select('id', 'name')->withCount('books')->paginate(5, ['*'], 'menu');

        return view('livewire.setting.book-setting', compact('settings', 'authors', 'genres', 'series'));
    }


    public function deleteAuthor($id)
    {
        $this->confirmDelete($id);
    }

    public function onDelete($id)
    {
    }
}
