<?php

namespace App\Http\Livewire\Member;

use App\Helper\WithModals;
use App\Models\Location;
use App\Models\Member;
use App\Models\MemberStatus;
use Livewire\Component;
use Livewire\WithPagination;

class AllMember extends Component
{
    use WithPagination;
    use WithModals;
    protected $paginationTheme = 'bootstrap';
    public $title = 'Members';
    protected $listeners = ['onDelete'];

    public $record = [
        5 => '5 records',
        10 => '10 records',
        25 => '25 records',
        50 => '50 records',
    ];

    public $search = [
        'location' => '',
        'member_status' => '',
        'showonly' => '10',
        'name' => '',
    ];

    public function render()
    {
        $locations = Location::all();
        $memberstatuses = MemberStatus::all('id', 'name');        
        $members = Member::when($this->search['location'], function ($query) {
            $query->where('location_id', $this->search['location']);
        })->when($this->search['member_status'], function ($query) {
            $query->where('member_status_id', $this->search['member_status']);
        })->when($this->search['name'], function ($query) {
            $query->where('name', 'like', '%' . $this->search['name'] . '%');
        })->paginate($this->search['showonly']);
        return view('livewire.member.all-member', compact('locations', 'memberstatuses', 'members' ));
    }

    public function onDelete($id)
    {
        $member = Member::find($id);
        $member->delete();
        session()->flash('success', 'Successfully deleted');
        return redirect()->to('/member');
    }

    public function delete($id)
    {
        $this->confirmDelete($id);
    }

    public function edit($id)
    {
        $this->emit('editMember', $id);
        $this->openModal('modalEditMember');
    }
}
