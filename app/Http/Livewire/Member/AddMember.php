<?php

namespace App\Http\Livewire\Member;

use App\Helper\WithData;
use App\Models\Institution;
use App\Models\Member;
use App\Models\Region;
use Livewire\Component;

class Addmember extends Component
{
    use WithData;
    public Member $member;

    public $institutions, $regions;


    public $rules = [
        "member.name" => 'required',
        "member.email" => 'required|email',
        "member.phone_no" => 'required',  
        "member.gender" => 'required',       
        "member.institution_id" => 'required',  
        "member.region_id" => 'required',  
        "member.address_1" => 'required',  
        "member.address_2" => 'required', 
    ];

    public function mount(){
        $this->member = new Member;
        $this->institutions = Institution::all('id','name');
        $this->regions = Region::all('id','name');
    }

    
    public function submit()
    {
        $this->validate();
        $this->member->save();        
        session()->flash('success', 'New member successfully created');
        return redirect()->to('/member');
    }

    public function render()
    {       
        return view('livewire.member.add-member');
    }
   
}
