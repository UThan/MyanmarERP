<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $name = 'Yu Than';

    protected $rules = [
        'name' => 'required'
    ];

    public function updated($value)
    {
        $this->validateOnly($value);
    }
    public function render()
    {
        return view('livewire.test');
    }
}
