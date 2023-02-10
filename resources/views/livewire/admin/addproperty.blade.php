<x-slot name="title">
    <x-admin-title title="hello" :dirs="['home' => 'home', 'setting' => 'setting']" />
</x-slot>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <x-alert />
                
        <form wire:submit.prevent='submit'>
            <div class="card">   
                <div class="card-header">
                    <h4 class="card-title">
                        Create new {{$title}}
                    </h4 >
                </div>            
                <div class="card-body">
                    <x-form.input name='model.name' label='Name' placeholder="Enter {{$title}} name" inline='10'/>   
                    @if ($title == 'Series')                
                    <x-form.input name='model.description' label='Description' placeholder="Enter {{$title}} description" inline='10'/>                              
                    @endif                  
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                </div>
            </div>
        </form>
            
    </div>
</div>
