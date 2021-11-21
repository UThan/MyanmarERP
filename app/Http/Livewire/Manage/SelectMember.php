<?php

namespace App\Http\Livewire\Manage;

use App\Helper\Helper;
use App\Helper\WithModals;
use App\Models\Classroom;
use App\Models\Hostel;
use App\Models\Member;
use Livewire\Component;


class SelectMember extends Component
{
    use WithModals;
    public $search = [
        'classroom' => '',
        'hostel' => '',
        'member' => '',
    ];

    public $select = '';


    public function render()
    {
        $classrooms = Helper::arrayForSelectInput(Classroom::all('id', 'name'));
        $hostels = Helper::arrayForSelectInput(Hostel::all('id', 'name'));
        $members = Member::when($this->search['classroom'], function ($query) {
            $query->where('classroom_id', $this->search['classroom']);
        })->when($this->search['hostel'], function ($query) {
            $query->where('hostel_id', $this->search['hostel']);
        })->when($this->search['member'], function ($query) {
            $query->where('name', 'like', '%' . $this->search['member'] . '%');
        })->take(5)->get();
        return view('livewire.manage.select-member', compact('classrooms', 'hostels', 'members'));
    }

    public function memberSelected()
    {
        $this->emit('memberSelected',$this->select);        
    }
}
