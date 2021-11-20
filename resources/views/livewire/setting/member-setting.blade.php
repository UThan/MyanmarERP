<x-slot name="title">
    <x-admin-title />
</x-slot>



<div class="row">
    <div class="col-md-6 px-4">
        <x-setting.member-table :data='$classrooms' name='Classroom' icon='fa fa-chalkboard-teacher' theme='primary' />
    </div>

    <div class="col-md-6 px-4">
        <x-setting.member-table :data='$hostels' name='Hostel' icon='fa fa-building' theme='success' />
    </div>
</div>
