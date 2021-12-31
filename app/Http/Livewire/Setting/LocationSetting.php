<?php

namespace App\Http\Livewire\Setting;

use App\Helper\WithModals;
use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;

class LocationSetting extends Component
{
    use WithPagination;
    use WithModals;
    protected $paginationTheme = 'bootstrap';

    public $listeners = ['onDelete'];
    public $sublocations ;

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

    public function showSubLocation($id){
        $this->sublocations = Location::where('main_location_id',$id)->withCount('books')->withCount('members')->get();           
    }

    public function render()
    {
        $locations = Location::where('main_location_id', 0)->select('id', 'name')->withCount('sublocations')->paginate(5);      
        
        return view('livewire.setting.location-setting', compact('locations'));
    }

    public function create($id){
        $this->emit('createLocation', $id);
        $this->openModal('modalLocation');
    }

    public function edit($id){
        $this->emit('editLocation', $id);
        $this->openModal('modalLocation');
    }

    public function onDelete($id)
    {
        $location = Location::find($id);
        $location->delete();
        session()->flash('success', 'successfully deleted');
        return redirect()->to('/setting/location');
    }

    public function delete($id)
    {
        $this->confirmDelete($id);
    }
}
