@props(['title' => 'home', 'dirs' => ['home' => 'home', 'dashboard' => 'home']])

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">{{ $title }}</h4>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($dirs as $key => $dir)
                        <li class="breadcrumb-item"><a href="{{ route($dir) }}">{{ $key }}</a></li>
                    @endforeach
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
