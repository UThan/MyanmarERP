<x-slot name="title">
    <x-admin-title title='Member List' :dirs="['home' => 'home', 'member' => 'member', 'new' => 'addmember']" />
</x-slot>


<div class="row">
    <div class="col-md-8 offset-md-2">
        <x-alert />
                
        <form wire:submit.prevent='submit'>
            <div class="card">               
                <div class="card-body">
        
                    <div class="form-row">
                        <div class="col">
                            <x-form.input name='field.name' label='Name' aria-placeholder="Enter member name" />
                        </div>
                        <div class="col">
                            <x-form.input type='email' name='field.email' label='Email' aria-placeholder="Enter email" />
                        </div>
                    </div>
                   
                    <div class="form-row">
                        <div class="col-md-6">
                            <x-form.input type='tel' name='field.phone_no' label='Phone number' aria-placeholder="Enter phone number" />
                        </div>
                    </div>
                   
                   
                    <a href="#"
                        wire:click.prevent="$toggle('showhostel')">{{ $showhostel ? 'Hide' : 'More +' }}</a>
        
                    @if ($showhostel)
                        <hr>
                       <div class="form-row">
                           <div class="col">
                            <x-form.select name='field.hostel' label='Hostel' aria-placeholder="Enter hostel name" />
                           </div>
                           <div class="col">                               
                            <x-form.select name='field.classroom' label='Classroom' aria-placeholder="Enter classroom" />
                           </div>
                       </div>
                    @endif
        
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
            
    </div>
</div>

   
