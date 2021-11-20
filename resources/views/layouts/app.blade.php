<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Smart Education</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    @stack('style')
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <!-- Theme style -->
    @livewireStyles
    <script src="{{ asset('/js/app.js') }}"></script>
</head>

<body class="sidebar-mini">
    <div class="wrapper">

        <x-admin-navbar />

        <x-admin-sidebar />

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            {{ $title }}
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- /.content -->

                    <div class="row">
                        <div class="col">
                            {{ $slot }}
                        </div>
                    </div>


                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <x-admin-footer />
    </div>

    </div>
    <!-- ./wrapper -->



    @stack('scripts')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>
</body>

</html>
