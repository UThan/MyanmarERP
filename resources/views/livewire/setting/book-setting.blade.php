<x-slot name="title">
    <x-admin-title title='Book Setting' :dirs="['home' => 'home', 'booksetting' => 'booksetting']" />
</x-slot>

<div>
    <x-alert/>
    <div class="row">
        <div class="col-md-6 px-4">
            <x-setting.book-table :data='$authors' name='Author' icon='fa fa-users' theme='primary' />
        </div>

        <div class="col-md-6 px-4">
            <x-setting.book-table :data='$locations' name='StoryLocation' icon='fa fa-users' theme='success' />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 px-4">
            <x-setting.book-table :data='$genres' name='Genre' icon='fa fa-users' theme='info' />
        </div>

        <div class="col-md-6 px-4">
            <x-setting.book-table :data='$series' name='Series' icon='fa fa-users' theme='warning' />
        </div>
    </div>
</div>
