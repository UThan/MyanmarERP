<div class="card">   
    <div class="card-header pt-4">
        <div class="row">
            <div class="col-md-6">
                <x-form.input type='search' name="search.member" placeholder="Search member..." />
            </div>
            <div class="col-md-3">
                <x-form.select name="search.category" placeholder='By category' :options='$classrooms' />
            </div>
            <div class="col-md-3">
                <x-form.select name="search.level" placeholder="Level" :options='$hostels' />
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if ($members && $members->count() > 0)
            <table class="table">
                <thead class='bg-info'>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Classroom</th>
                        <th>Hostel</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td> {{ $member->name }} </td>
                            <td> {{ $member->email }} </td>
                            <td> <span class="badge bg-success">{{ $member->member_status->name }}</span> </td>

                            <td>
                                @if ($members && $member->classrooms->count() > 0){
                                    @foreach ($member->classrooms as $classroom)
                                        {{ $classroom->name }}
                                    @endforeach
                                    }
                                @else --
                                @endif 
                            </td>
                            <td>
                                @if ($members && $member->hostels->count() > 0){
                                    @foreach ($member->hostels as $hostel)
                                        {{ $classroom->name }}
                                    @endforeach
                                    }
                                @else --
                                @endif 
                            </td>
                            <td style="width: 4rem">
                                <div class="icheck-primary">
                                <input type="radio" name="user" id="{{$member->id}}" value='{{$member->id}}' wire:model='select'/>
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
        <button class="btn btn-primary float-right" @if (!$select) disabled  @endif wire:click="memberSelected">Next-></button>
    </div>
    
</div>

