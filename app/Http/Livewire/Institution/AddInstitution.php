<?php

namespace App\Http\Livewire\Institution;

use App\Models\Institution;
use App\Models\InstitutionType;
use App\Models\Region;
use Livewire\Component;
use PDO;

class AddInstitution extends Component
{
    public $regions,$institution_types;
    public Institution $institution;

    public $rules = [
        'institution.name' => 'required',
        'institution.region_id' => 'required',
        'institution.institution_type_id' => 'required',
        'institution.address_1' => '',
        'institution.address_2' => '',
        'institution.address_3' => '',
    ];

    public function mount()     
    {
        $this->institution = new Institution;
        $this->regions = Region::all('id','name');
        $this->institution_types = InstitutionType::all('id','name');
    }

    public function render()
    {
        return view('livewire.institution.add-institution');
    }

    public function submit()
    {
        $this->validate();
        $this->institution->save();
        session()->flash('success', 'Successfully Created');
        return redirect()->to('/home');
    }
}
