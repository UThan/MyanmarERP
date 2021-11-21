<?php

namespace App\Http\Livewire\Member;

use App\Models\Member;
use Livewire\Component;

class Editmember extends Component
{
    public Member $member;
    protected $listeners = ['editMember' => 'bindData'];

    public $rules = [
        'member.name' => 'required',
        'member.email' => 'required',
        'member.phone_no' => 'required',
    ];

    public function render()
    {
        return view('livewire.member.editmember');
    }

    public function bindData($id)
    {
        $this->member = Member::find($id);
    }

    public function submit()
    {
        $this->validate();
        $this->member->save();
        session()->flash('success', 'successfully updated');
        return redirect()->to('/member');
    }
}
