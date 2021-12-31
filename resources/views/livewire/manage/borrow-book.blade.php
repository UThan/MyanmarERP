<x-slot name="title">
    <x-admin-title title='Borrow Book' :dirs="['home' => 'home', 'borrowbook' => 'borrowbook']" />
</x-slot>

<div>
<x-alert/>
<div class="row">
    <div class="col">        
        @if (!$member)
        @livewire('manage.select-member',key('member'))  
        @elseif ($member && !$books)
        @livewire('manage.select-book',key('book'))
        @elseif ($books)
        @livewire('manage.confirm-borrow',compact('member','books'),key('confirm'))
        @endif 

    </div>
</div>

</div>
