<?php

namespace App\Http\Livewire\Admin;

use App\Models\Audience;
use App\Models\BookStatus;
use App\Models\Genre;
use App\Models\InstitutionType;
use App\Models\Level;
use App\Models\Region;
use App\Models\Series;
use App\Models\StoryLocation;
use Livewire\Component;

class Selectproperties extends Component
{
    public $fields = [
        'Audience' => Audience::class,
        'Genre' => Genre::class,    
        'Level' => Level::class,
        'StoryLocation' => StoryLocation::class,    
        'Series' => Series::class,   
        'BookStatus' => BookStatus::class,
        'Region' => Region::class,
        'InstitutionType' => InstitutionType::class
    ];

    public $field = '';

    public function render()
    {
        return view('livewire.admin.selectproperties');
    }

    
}
