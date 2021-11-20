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

<body {{ $attributes }}>


    {{ $slot }}
    <!-- ./wrapper -->



    @stack('scripts')

</body>

</html>
