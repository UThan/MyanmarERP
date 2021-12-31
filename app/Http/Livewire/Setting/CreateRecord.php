<?php

namespace App\Http\Livewire\Setting;

use App\Models\Author;
use App\Models\Classroom;
use App\Models\Genre;
use App\Models\Hostel;
use App\Models\Location;
use App\Models\Series;
use App\Models\StoryLocation;
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
    public function addStoryLocation()
    {
        $this->validate();
        StoryLocation::create([
            'name' => $this->inputValue
        ]);
        session()->flash('success', 'New Story Location created');
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

    
    public function render()
    {
        return view('livewire.setting.create-record');
    }
}
