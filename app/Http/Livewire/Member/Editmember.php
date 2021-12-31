<?php

namespace App\Http\Livewire\Member;

use App\Models\Member;
use App\Models\Location;
use App\Models\MemberStatus;
use Livewire\Component;

class Editmember extends Component
{
    public Member $member;  
    protected $listeners = ['editMember' => 'bindData']; 

    public $rules = [
        "member.name" => 'required',
        "member.email" => 'required|email',
        "member.phone_no" => 'required|numeric',
        "member.member_status_id" => 'required',
        "member.location_id" => ''
    ];    

    public function bindData($id)
    {
        $this->member = Member::find($id);
    }
    
    public function submit()
    {
        $this->validate();
        $this->member->save();        
        session()->flash('success', 'Updated successfully');
        return redirect()->to('/member');
    }

    public function render()
    {
        $locations = Location::all();
        $memberstatuses = MemberStatus::all('id', 'name');
        return view('livewire.member.edit-member',compact('locations', 'memberstatuses'));
    }
    
}
