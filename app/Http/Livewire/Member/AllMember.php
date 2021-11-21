<?php

namespace App\Http\Livewire\Member;

use App\Helper\Helper;
use App\Helper\WithModals;
use App\Models\Classroom;
use App\Models\Hostel;
use App\Models\Member;
use App\Models\MemberStatus;
use Livewire\Component;
use Livewire\WithPagination;

class AllMember extends Component
{
    use WithPagination;
    use WithModals;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $title = 'Members';
    protected $listeners = ['onDelete'];

    public function render()
    {
        $classrooms = Helper::arrayForSelectInput(Classroom::all('id', 'name'));
        $hostels = Helper::arrayForSelectInput(Hostel::all('id', 'name'));
        $status = Helper::arrayForSelectInput(MemberStatus::all('id', 'name'));
        $members = Member::search('name', $this->search)->paginate(20);
        return view('livewire.member.all-member', compact('members', 'classrooms', 'hostels', 'status'));
    }

    public function onDelete($id)
    {
        $member = Member::find($id);
        $member->delete();
        session()->flash('success', 'Successfully deleted');
        return redirect()->to('/member');
    }

    public function deleteMember($id)
    {
        $this->confirmDelete($id);
    }

    public function editMember($id)
    {
        $this->emit('editMember', $id);
        $this->openModal('modalEditMember');
    }
}
