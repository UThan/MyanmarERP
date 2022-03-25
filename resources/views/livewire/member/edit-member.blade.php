<x-slot name="title">
    <x-admin-title title='Update Member Info' :dirs="['home' => 'home', 'member' => 'member', 'new' => 'addmember']" />
</x-slot>


<div class="row">
    <div class="col-md-8 offset-md-2">
        <x-alert />
                
        <form wire:submit.prevent='submit'>
            <div class="card">               
                <div class="card-body">
                    <x-form.input name='member.name' label='Name' placeholder="Enter member name" inline='9'/>
                    <x-form.input type='email' name='member.email' label='Email' placeholder="Enter email" inline='9'/>
                    <x-form.input type='tel' name='member.phone_no' label='Phone number' placeholder="Enter phone number" inline='9'/>
                    <x-form.select :options='$gender' name="member.gender" label="Gender" placeholder="Select gender" inline='9' />
                    <x-form.select :models='$memberstatus' name="member.member_status_id" label="Member Status" placeholder="member status" inline='9' />
                    <hr>  
                    <x-form.select :models='$institutions' name="member.institution_id" label="Institution" placeholder="Select institution" inline='9' />
                    <x-form.select :models='$regions' name="member.region_id" label="Region" placeholder="Select region" inline='9' />
                    <x-form.input name='member.address_1' label='Address' placeholder="Address Line 1" inline='9'/>
                    <x-form.input name='member.address_2' label='Address' placeholder="Address Line 2" inline='9'/>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save mr-1"></i> Save</button>
                </div>
            </div>
        </form>
            
    </div>
</div>

   
