<?php

namespace App\Http\Livewire\Setting;

use App\Models\Location;
use Livewire\Component;

class CreateLocation extends Component
{
    public $listeners = ['createLocation','editLocation'];

    public $manage = 'create';
    public $parent_id = 0;

    public Location $location;

    public $rules = [
        'location.name' => 'required',
    ];

    public function render()
    {
        return view('livewire.setting.create-location');
    }

    public function createLocation($id){
        $this->manage = 'Create';        
        $this->location = new Location();       
        $this->parent_id = $id;
    }

    public function editLocation($id){
        $this->manage = 'Edit';
        $this->location = Location::find($id);
    }
    

    public function submit(){
        $this->location->main_location_id = $this->parent_id;
        $this->location->save();
        session()->flash('success', 'successfully added');
        return redirect()->to('/setting/location');
    }
}
