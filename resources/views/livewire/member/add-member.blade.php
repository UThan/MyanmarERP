<x-slot name="title">
    <x-admin-title title='Member Registeration' :dirs="['home' => 'home', 'member' => 'member', 'new' => 'addmember']" />
</x-slot>


<div class="row">
    <div class="col-md-6 offset-md-3">
        <x-alert />
                
        <form wire:submit.prevent='submit'>
            <div class="card">               
                <div class="card-body">
                    <x-form.input name='member.name' label='Name' placeholder="Enter member name" inline='9'/>
                    <x-form.input type='email' name='member.email' label='Email' placeholder="Enter email" inline='9'/>
                    <x-form.input type='tel' name='member.phone_no' label='Phone number' placeholder="Enter phone number" inline='9'/>
                    <hr>
                    <x-form.select name="member.location_id" label="Book Location"
                                placeholder="Select category" inline='9'>
                                @foreach ($locations as $location)
                                    <option value="{{$location->id}}">
                                        
                                        @isset($location->parentlocation)                                          
                                            {{$location->parentlocation->name}} /
                                        @endisset
                                        {{$location->name}} </option>
                                @endforeach
                            </x-form.select>
        
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                </div>
            </div>
        </form>
            
    </div>
</div>

   
