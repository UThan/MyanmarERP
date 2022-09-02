<div class="card card-secondary">
    <div class="card-header pt-4">
        <div class="row">
            <div class="col-md-2">
                <x-form.select name="search.region" :models='$regions' placeholder="Location" />
            </div>
            <div class="col-md-2">
                <x-form.select name="search.institution" :models='$institutions' placeholder="Institutions" />
            </div>
            <div class="col-md-2 offset-6">
                <x-form.input type='search' name="search.member" placeholder="Search member..." />
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if ($members && $members->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone No</th>
                        <th>Location</th>
                        <th>Institution</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td> {{ $member->name }} </td>
                            <td> {{ $member->phone_no }} </td>
                            <td>                                
                                    {{ $member->region ? $member->region->name : 'unknown' }}                               
                            </td>
                            <td> 
                                    {{ $member->institution ? $member->institution->name : 'unknown' }}
                            </td>
                            <td>
                                <span class="badge badge-{{ $member->member_status->status }}">
                                    {{ $member->member_status->name }}
                                </span>
                            </td>

                            <td style="width: 4rem; padding: 5px">
                                <div class="icheck-primary">
                                    <input type="radio" name="user" id="{{ $member->id }}" value='{{ $member->id }}'
                                        wire:model='selectedmember' />
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
        <button class="btn btn-sm btn-primary float-right" @if (!$selectedmember) disabled @endif
            wire:click="selectmember">Select</button>
    </div>

</div>
