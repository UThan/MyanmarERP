<?php

namespace App\Http\Livewire\Institution;

use App\Helper\WithData;
use App\Models\Institution;
use App\Models\InstitutionType;
use App\Models\Region;
use Livewire\Component;

class AllInstitution extends Component
{
    use WithData;

    public $institution_types, $regions;

    public $search = [
        'institution_type' => '',
        'region' => '',
        'showonly' => '10'
    ];

    public function mount()
    {
        $this->institution_types = InstitutionType::all('id','name');
        $this->regions = Region::all('id','name');
    }

    public function render()
    {
        $institutions = Institution::when($this->search['region'], function ($query) {
            $query->where('region_id', $this->search['region']);
        })->when($this->search['institution_type'], function ($query) {
            $query->where('institution_type_id', $this->search['institution_type']);
        })->paginate($this->search['showonly']);
        return view('livewire.institution.all-institution',compact('institutions'));
    }    

    public function delete($id)
    {
        Institution::destroy($id);
    }
}
