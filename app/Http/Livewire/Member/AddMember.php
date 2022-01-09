<?php

namespace App\Http\Livewire\Member;

use App\Models\Location;
use App\Models\Member;
use Livewire\Component;

class Addmember extends Component
{
    public Member $member;
    public $main_location,$sub_locations;   

    public $rules = [
        "member.name" => 'required',
        "member.email" => 'required|email',
        "member.phone_no" => 'required',
        "member.location_id" => '',
        "main_location" => '',
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
        $main_locations = Location::where('main_location_id', 0)->get();
        return view('livewire.member.add-member',compact('main_locations'));
    }

    public function updatedMainLocation($id)
    {
            $this->sub_locations = Location::where('main_location_id',$id)->get();
    }

    public function updatedSubLocation($id)
    {
        $this->member->location_id =$id;
    }
}
