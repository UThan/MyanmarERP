<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyanmarERP</title> 

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/img/favicon/site.webmanifest') }}">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
   
  <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> 
  <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}"> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <x-admin-navbar/>

  <x-admin-sidebar/>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
          {{ $title }}
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- /.container-fluid -->
      <div class="container-fluid">
              
              
              <div class="row">
                  <div class="col">
                      {{$slot}}
                  </div>
              </div>
          
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <x-admin-footer/>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- AdminLTE App -->

<livewire:scripts>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/app.js') }}" ></script>
@stack('scripts')

</body>
</html>
