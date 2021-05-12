<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/creative.min.js') }}"></script>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/creative.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons-creative.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />

</head>

<body class="">
    <!-- Begin page -->
    <div class="wrapper">
        @yield('master-content')
    </div>
    <!-- END wrapper -->
 
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
