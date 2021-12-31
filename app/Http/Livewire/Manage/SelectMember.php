<?php

namespace App\Http\Livewire\Manage;

use App\Helper\Helper;
use App\Helper\WithModals;
use App\Models\Classroom;
use App\Models\Hostel;
use App\Models\Location;
use App\Models\Member;
use App\Models\MemberStatus;
use Livewire\Component;


class SelectMember extends Component
{
    use WithModals;
    public $search = [
        'location' => '',
        'member' => '',
    ];

    public $select = '';


    public function render()
    {
        $locations = Location::all();
        $members = Member::when($this->search['location'], function ($query) {
            $query->where('location_id', $this->search['location']);
        })->when($this->search['member'], function ($query) {
            $query->where('name', 'like', '%' . $this->search['member'] . '%');
        })->where('member_status_id', ['1','2'])
        ->take(10)->get();
        return view('livewire.manage.select-member', compact('members','locations'));
    }

    public function memberSelected()
    {
        $this->emit('memberSelected',$this->select);        
    }
}
