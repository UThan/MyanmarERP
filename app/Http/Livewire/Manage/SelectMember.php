<?php

namespace App\Http\Livewire\Manage;


use App\Helper\WithModals;
use App\Models\Institution;
use App\Models\Location;
use App\Models\Member;
use App\Models\Region;
use Livewire\Component;


class SelectMember extends Component
{
    use WithModals;
    public $search = [
        'institution' => '',
        'region' => '',
        'member' => '',
    ];

    public $selectedmember = '';
    public $regions,$institutions;

    public function render()
    {       
        $members = Member::when($this->search['institution'], function ($query) {
            $query->where('institution_id', $this->search['institution']);
        })->when($this->search['region'], function ($query) {
            $query->where('region_id', $this->search['region']);
        })->when($this->search['member'], function ($query) {
            $query->where('name', 'like', '%' . $this->search['member'] . '%');
        })->where('member_status_id', ['1','2'])
        ->take(10)->get();
        return view('livewire.manage.select-member', compact('members'));
    }

    public function mount()
    {
        $this->institutions = Institution::all('id','name');
        $this->regions = Region::all('id','name');
    }

    public function selectmember()
    {
        $this->emit('memberSelected', $this->selectedmember);
    }
    

   
}
