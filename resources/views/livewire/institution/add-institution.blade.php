<x-slot name="title">
    <x-admin-title title='Create Institution' :dirs="['home' => 'home', 'institution' => 'institution']" />
</x-slot>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <x-alert />
                
        <form wire:submit.prevent='submit'>
            <div class="card">               
                <div class="card-body">
                    <x-form.input name='institution.name' label='Name' placeholder="Enter Institution name" inline='9'/>
                    <x-form.select :models='$regions' name="institution.region_id" label="Region" placeholder="Select region" inline='9'/>
                    <x-form.select :models='$institution_types' name="institution.institution_type_id" label="Institution Type" placeholder="Select Institution Type" inline='9'/>                    
                    <hr>  
                    <x-form.input name='institution.address_1' label='Address Line 1' placeholder="Enter address" inline='9'/>
                    <x-form.input name='institution.address_2' label='Address Line 2' placeholder="Enter address" inline='9'/>
                    <x-form.input name='institution.address_3' label='Address Line 3' placeholder="Enter address" inline='9'/>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                </div>
            </div>
        </form>
            
    </div>
</div>