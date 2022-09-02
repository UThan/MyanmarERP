<?php

namespace App\Http\Livewire\Member;

use App\Helper\WithData;
use App\Helper\WithModals;
use App\Models\Institution;
use App\Models\Location;
use App\Models\Member;
use App\Models\MemberStatus;
use App\Models\Region;
use Livewire\Component;
use Livewire\WithPagination;

class AllMember extends Component
{
    use WithPagination;
    use WithModals;
    use WithData;

    protected $paginationTheme = 'bootstrap';
    public $title = 'Members';
    protected $listeners = ['onDelete'];  
    public $institutions, $regions; 

    public $search = [
        'member_status' => '',
        'showonly' => '10',
        'region' => '',
        'institution' => '',
        'name' => '',
    ];

    public function mount(){
        $this->memberstatuses = MemberStatus::all('id', 'name');  
        $this->institutions = Institution::all('id','name');
        $this->regions = Region::all('id','name');
    }

    public function render()
    {              
        $members = Member::when($this->search['member_status'], function ($query) {
            $query->where('member_status_id', $this->search['member_status']);
        })->when($this->search['name'], function ($query) {
            $query->where('name', 'like', '%' . $this->search['name'] . '%');
        })->paginate($this->search['showonly']);
        return view('livewire.member.all-member', compact('members'));
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
   
}
