<div>
    <form wire:submit.prevent='submit'>
        <div class="modal-header">
            <h5 class="modal-title">Edit member</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">                          
                        <x-form.input name='member.name' label='Name' placeholder="Enter member name" inline='9'/>
                        <x-form.input type='email' name='member.email' label='Email' placeholder="Enter email" inline='9'/>
                        <x-form.input type='tel' name='member.phone_no' label='Phone number' placeholder="Enter phone number" inline='9'/>
                        <hr>
                        <x-form.select :models='$memberstatuses' name="member.member_status_id" label="Status" placeholder="Status" inline='9'/>
                        <x-form.select name="member.location_id" label="Location" placeholder="Select Location" inline='9'>
                            @foreach ($locations as $location)
                                    <option value="{{$location->id}}">
                                        
                                        @isset($location->parentlocation)                                          
                                            {{$location->parentlocation->name}} /
                                        @endisset
                                        {{$location->name}} </option>
                                @endforeach
                        </x-form.select>
        </div>

        
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </div>
    </form>
</div>
