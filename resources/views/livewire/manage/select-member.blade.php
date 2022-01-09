<div class="card">
    <div class="card-header pt-4">
        <div class="row">
            <div class="col-md-2">
                <x-form.select name="main_location" :models='$main_locations'
                    placeholder="Main Location" />               
            </div>
            <div class="col-md-2">
                @if ($sub_locations)
                <x-form.select name="search.location" :models='$sub_locations' placeholder="Sub Location"  />
                @endif
            </div>

            <div class="col-md-2 offset-6">
                <x-form.input type='search' name="search.member" placeholder="Search member..." />
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if ($members && $members->count() > 0)
        <table class="table">
            <thead class='bg-secondary'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr>
                    <td> {{ $member->name }} </td>
                    <td> {{ $member->email }} </td>
                    <td> {{ $member->phone_no }} </td>
                    <td> <span class="badge badge-{{$member->member_status->status}}">{{ $member->member_status->name
                            }}</span> </td>

                    <td>
                        @if ($member->location)
                        {{ $member->location->name}}
                        @isset($member->location->parentlocation)
                        / {{ $member->location->parentlocation->name}}
                        @endisset
                        @else
                        Unknown
                        @endif
                    </td>

                    <td style="width: 4rem; padding: 5px">
                        <div class="icheck-primary">
                            <input type="radio" name="user" id="{{$member->id}}" value='{{$member->id}}'
                                wire:model='select' />
                            <label for="{{ $member->id }}"></label>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center text-muted p-4 mb-0">No data to shown</p>
        @endif
    </div>

    <div class="card-footer">
        <button class="btn btn-primary float-right" @if (!$select) disabled @endif
            wire:click="memberSelected">Next</button>
    </div>

</div>