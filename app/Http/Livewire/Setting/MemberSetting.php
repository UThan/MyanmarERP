<?php

namespace App\Http\Livewire\Setting;

use App\Models\Series;
use App\Models\Setting;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Classroom;
use App\Models\Hostel;
use Livewire\Component;
use Livewire\WithPagination;

class MemberSetting extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $author, $genre, $setting;

    public $classroom, $hostel;

    public $category, $level;

    public $rules = [
        'author' => 'required',
        'genre' => 'required',
        'setting' => 'required',
        'series' => 'required',
        'classroom' => 'required',
        'hostel' => 'required',
        'category' => 'required',
        'level' => 'required',
    ];

    public function render()
    {
        $hostels = Hostel::select('id', 'name')->withCount('members')->paginate(5, ['*'], 'hostel');
        $classrooms = Classroom::select('id', 'name')->withCount('members')->paginate(5, ['*'], 'classroom');

        return view('livewire.setting.member-setting', compact('hostels', 'classrooms'));
    }
}
