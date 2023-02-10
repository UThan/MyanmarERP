<?php

namespace App\Http\Livewire\Admin;


use Livewire\Component;

class Showproperty extends Component
{   
    public $classname;
    public $title;

    public $rules = [
        'propertyname' => 'required'
    ];

    public function mount($property){  
        $prefix = "App\\Models\\" ; 
        $this->classname = $prefix.$property;   
        $this->title = $property;          
    }

    public function render()
    {
        $models = $this->classname::paginate(5);
        return view('livewire.admin.showproperty',compact('models'));
    }

    public function delete($id)
    {      
        $this->classname::destroy($id);
        session()->flash('success', 'Successfully Added');
        return redirect()->route('property',$this->title);
    }
}
