<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0 text-muted">
            Summary
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <h5 class="text-secondary mb-4">
                    <i class="fa fa-book" aria-hidden="true"></i> Selected Books
                </h4>
                <table class="table tabel-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Series</th>
                            <th>Level</th>
                            <th>Location</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($selectedbooks as $book)
                        <tr>
                          <td>{{$book->book_no}}</td>
                          <td>{{$book->title}}</td>
                          <td>{{$book->series->name}}</td>
                          <td>{{$book->level->name}}</td>
                          <td>
                              @if ($book->book_location)
                                {{$book->book_location->name}}
                              @else
                                  Unknown
                              @endif
                          </td>
                          <td><a href="#" class="btn-link btn-sm text-danger" wire:click.prevent='remove({{$book->id}})'>remove</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="text-secondary mb-4">
                    <i class="fa fa-user" aria-hidden="true"></i> Member Info
                </h4>

                <dl class="row text-secondary">
                    <dt class="col-sm-4"> <i class="fa fa-user" aria-hidden="true"></i> Name</dt>
                    <dd class="col-sm-8">{{$member->name}}</dd>
                    <dt class="col-sm-4"><i class="fa fa-envelope" aria-hidden="true"></i> Email</dt>
                    <dd class="col-sm-8">{{$member->email}}</dd>
                    <dt class="col-sm-4"><i class="fa fa-phone" aria-hidden="true"></i> Phone No</dt>
                    <dd class="col-sm-8">{{$member->phone_no}}</dd>   
                    <dt class="col-sm-4"><i class="fa fa-building" aria-hidden="true"></i> Classrooms</dt>  
                    <dd class="col-sm-8">
                        @if ($member->location)
                            {{$member->location->name}}
                        @else
                            Unknown
                        @endif
                    </dd>    
                </dl>

                <hr>

            <button class="btn btn-block btn-primary" @if ($selectedbooks->count() < 1) disabled @endif wire:click='borrow'><i class="fas fa-book mr-2"></i>Borrow Books</button>
            </div>
            
        </div>
       
    </div>
    <div class="card-footer">
       <button class="btn btn-secondary" wire:click='back'>Back</button>
    </div>
</div>