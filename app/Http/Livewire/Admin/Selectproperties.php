<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Selectproperties extends Component
{
    public $fields = [
        'Audience' => 'Audience',
        'Genre' => 'Genre',    
        'Level' => 'Level',
        'StoryLocation' => 'Story location',    
        'Series' => 'Series',   
        'BookStatus' => 'Book status',
        'Region' => 'Region',
        'InstitutionType' => 'Institution type'
    ];

    public $field = '';

    public function render()
    {
        return view('livewire.admin.selectproperties');
    }

    
}
