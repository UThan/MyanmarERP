<?php

namespace App\Http\Livewire\Manage;


use App\Helper\WithModals;
use App\Models\Location;
use App\Models\Member;
use Livewire\Component;


class SelectMember extends Component
{
    use WithModals;
    public $search = [
        'location' => '',
        'member' => '',
    ];

    public $select = '';
    public $sub_locations,$main_location;

    public function render()
    {
        $main_locations = Location::where('main_location_id',0)->get();
        $members = Member::when($this->search['location'], function ($query) {
            $query->where('location_id', $this->search['location']);
        })->when($this->search['member'], function ($query) {
            $query->where('name', 'like', '%' . $this->search['member'] . '%');
        })->where('member_status_id', ['1','2'])
        ->take(10)->get();
        return view('livewire.manage.select-member', compact('members','main_locations'));
    }

    public function memberSelected()
    {
        $this->emit('memberSelected',$this->select);        
    }

    public function updatedMainLocation($id){
        $this->sub_locations = Location::where('main_location_id',$id)->get();
    }
}
