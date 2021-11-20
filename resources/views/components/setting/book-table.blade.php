@props(['data', 'name' => 'data', 'icon', 'theme' => 'dark'])
<div class="card card-{{ $theme }}">
    <div class="card-header">
        <h3 class="card-title mb-0 mt-2">
            @isset($icon)
                <i class="fa fa-{{ $icon }} mr-2" aria-hidden="true"></i>
            @endisset
            All
            {{ $name }}
        </h3>

        <div class="card-tools">
            <a href="#" class="btn btn-outline-light btn-sm" data-toggle="modal"
                data-target="#modal{{ $name }}">Add
                <i class="fa fa-plus ml-2" aria-hidden="true"></i></a>

            <x-modal id="modal{{ $name }}">
                @livewire('setting.create-record', compact('name'),key($name))
            </x-modal>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body p-0">
        @if ($data && $data->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Books</th>
                        <th style="width: 60px">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $table)
                        <tr>
                            <td>{{ $table->id }}</td>
                            <td>{{ $table->name }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $table->books_count }}</span>
                            </td>
                            <td>
                                <a href=""><i class="fa fa-edit text-warning"></i></a>

                                @if ($table->books_count == 0)
                                    <a href="" class="ml-2"><i class="fa fa-trash text-danger"></i></a>
                                @else
                                    <a href="" class="ml-2"><i class="fa fa-trash text-light"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-muted p-4 mb-0">No data to shown</p>
        @endif
    </div>
    <!-- /.card-body -->
    @if ($data->hasPages())
        <div class="card-footer">
            {{ $data->onEachSide(0)->links() }}
        </div>

    @endif

</div>
