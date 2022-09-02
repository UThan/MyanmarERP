<?php

namespace App\Http\Livewire\Member;

use App\Helper\WithData;
use App\Models\Institution;
use App\Models\Member;
use App\Models\MemberStatus;
use App\Models\Region;
use Livewire\Component;

class EditMember extends Component
{
    use WithData;
    public Member $member;

    public $institutions, $regions, $memberstatus;


    public $rules = [
        "member.name" => 'required',
        "member.email" => 'required|email',
        "member.phone_no" => 'required',  
        "member.gender" => 'required',       
        "member.institution_id" => '',  
        "member.region_id" => '',  
        "member.address_1" => '',  
        "member.address_2" => '', 
        "member.member_status_id" => 'required', 
    ];

    public function mount(Member $member){
        $this->member = $member;
        $this->institutions = Institution::all('id','name');
        $this->regions = Region::all('id','name');
        $this->memberstatus = MemberStatus::all('id','name');
    }

    
    public function submit()
    {
        $this->validate();
        $this->member->save();        
        session()->flash('success', 'Member Infomation Updated');
        return redirect()->to('/member');
    }

    public function render()
    {       
        return view('livewire.member.edit-member');
    }
   
}
