<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Addproperty extends Component
{
    public $title , $name, $classname, $model, $description;

    public $rules = [
        'model.name' => 'required'
    ];

    public function mount($property){
        $prefix = "App\\Models\\" ; 
        $this->classname = $prefix.$property;  
        $this->title = $property;
        $this->model = new $this->classname;
        if($this->title == 'Series'){
            $this->rules['model.description'] = 'required';
        }
    }

    public function render()
    {
        return view('livewire.admin.addproperty');
    }

    public function submit(){
        $this->validate();     
        $this->model->save(); 
        session()->flash('success', 'Successfully Added');
        return redirect()->route('property', $this->title); 
    }
}
