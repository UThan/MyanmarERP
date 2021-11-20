<?php

namespace App\Http\Livewire\Member;

use App\Models\Member;
use Livewire\Component;

class Addmember extends Component
{
    public $title = 'Add member';
    public $showhostel = false;
    public $field = [
        "name" => '',
        "email" => '',
        "phone_no" => '',
        "hostel" => '',
        "classroom" => '',
    ];

    public $rules = [
        "field.name" => 'required',
        "field.email" => 'required|email',
        "field.phone_no" => 'required|numeric',
    ];

    public $validationAttributes = [
        "field.name" => 'name',
        "field.email" => 'email',
        "field.phone_no" => 'phone_no',
    ];

    public function updated($field)
    {
        if ($field !== "showhostel") {
            $this->validateOnly($field);
        }
    }

    public function submit()
    {
        $validated = $this->validate();
        $member = new Member;
        $member->name = $validated['field']['name'];
        $member->email = $validated['field']['email'];
        $member->phone_no = $validated['field']['phone_no'];
        $member->joined_date = date("Y-m-d");
        $member->member_status_id = 1;  //active
        $member->save();
        session()->flash('success', 'Successfully created');
        return redirect()->to('/member');
    }

    public function render()
    {
        return view('livewire.member.addmember');
    }
}
