<?php

namespace App\Http\Livewire\Member;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class AllMember extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $title = 'Members';
    public function render()
    {
        $members = Member::search('name', $this->search)->paginate(20);
        return view('livewire.member.all-member', ['members' => $members]);
    }
}
