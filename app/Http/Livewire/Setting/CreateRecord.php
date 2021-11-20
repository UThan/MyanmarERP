<?php

namespace App\Http\Livewire\Setting;

use App\Models\Author;
use App\Models\Classroom;
use App\Models\Genre;
use App\Models\Hostel;
use App\Models\Series;
use App\Models\Setting;
use Livewire\Component;

class CreateRecord extends Component
{
    public $name = 'field';
    public $inputValue;
    public $rules = [
        'inputValue' => 'required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function addAuthor()
    {
        $this->validate();
        Author::create([
            'name' => $this->inputValue
        ]);
        session()->flash('success', 'New author created');
        return redirect()->to('/setting/book');
    }

    public function addGenre()
    {
        $this->validate();
        Genre::create([
            'name' => $this->inputValue
        ]);
        session()->flash('success', 'New Genre created');
        return redirect()->to('/setting/book');
    }
    public function addSetting()
    {
        $this->validate();
        Setting::create([
            'name' => $this->inputValue
        ]);
        session()->flash('success', 'New Setting created');
        return redirect()->to('/setting/book');
    }
    public function addSeries()
    {
        $this->validate();
        Series::create([
            'name' => $this->inputValue
        ]);
        session()->flash('success', 'New Series created');
        return redirect()->to('/setting/book');
    }

    public function addClassroom()
    {
        $this->validate();
        Classroom::create([
            'name' => $this->inputValue
        ]);
        session()->flash('success', 'New Classroom created');
        return redirect()->to('/setting/member');
    }

    public function addHostel()
    {
        $this->validate();
        Hostel::create([
            'name' => $this->inputValue
        ]);
        session()->flash('success', 'New Hostel created');
        return redirect()->to('/setting/member');
    }

    public function render()
    {
        return view('livewire.setting.create-record');
    }
}
