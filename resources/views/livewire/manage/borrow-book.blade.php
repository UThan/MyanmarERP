<x-slot name="title">
    <x-admin-title title='Borrow Book' :dirs="['home' => 'home', 'borrowbook' => 'borrowbook']" />
</x-slot>

<div>
<x-alert/>
<div class="row">
    <div class="col">        
        @if ($step ==  1)
        @livewire('manage.select-member',key('member'))  
        @elseif ($step == 2)
        @livewire('manage.select-book',key('book'))
        @elseif ($step == 3) 
        @livewire('manage.confirm-borrow',compact('member','books'),key('confirm'))
        @endif 
    </div>
</div>

</div>
