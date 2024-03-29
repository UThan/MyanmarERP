<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Editproperty extends Component
{
    public $title , $name, $classname, $model, $description;

    public $rules = [
        'model.name' => 'required',
    ];

    

    public function mount($property,$id){
        $prefix = "App\\Models\\" ; 
        $this->classname = $prefix.$property;  
        $this->title = $property;
        $this->model = $this->classname::find($id);

        if($this->title == 'Series'){
            $this->rules['model.description'] = 'required';
        }
    }

    public function render()
    {
        return view('livewire.admin.editproperty');
    }

    public function submit(){
        $this->validate();         
        $this->model->save(); 
        
        session()->flash('success', 'Successfully Updated');
        return redirect()->route('property', $this->title); 
    }
}
