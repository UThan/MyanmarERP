<?php

namespace App\Http\Livewire\Member;

use App\Models\Member;
use App\Models\Location;
use App\Models\MemberStatus;
use Livewire\Component;

class Editmember extends Component
{
    public Member $member;  
    public $main_location,$sub_locations;   
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
        $this->reset(['main_location', 'sub_locations']);
        if($this->member->location_id){
            $this->main_location = $this->member->location->main_location_id;
            $this->sub_locations = Location::where('main_location_id',$this->main_location)->get();
        }
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
        $main_locations = Location::where('main_location_id','0')->get();;
        $memberstatuses = MemberStatus::all('id', 'name');
        return view('livewire.member.edit-member',compact('main_locations', 'memberstatuses'));
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
