<?php

namespace App\Http\Livewire\Member;

use App\Models\Location;
use App\Models\Member;
use Livewire\Component;

class Addmember extends Component
{
    public Member $member;   

    public $rules = [
        "member.name" => 'required',
        "member.email" => 'required|email',
        "member.phone_no" => 'required',
        "member.location_id" => '',
    ];

    public function mount(){
        $this->member = new Member;
    }

    
    public function submit()
    {
        $this->validate();
        $this->member->member_status_id = '1';
        $this->member->save();        
        session()->flash('success', 'New member successfully created');
        return redirect()->to('/member');
    }

    public function render()
    {
        $locations = Location::all();
        return view('livewire.member.add-member',compact('locations'));
    }
}
