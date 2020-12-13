<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

<!-- Css Styles -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    @yield('style')
</head>
<body>
    @yield('content')
        <!-- Js Plugins -->
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
        <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('js/jquery.zoom.min.js')}}"></script>
        <script src="{{asset('js/jquery.dd.min.js')}}"></script>
        <script src="{{asset('js/jquery.slicknav.js')}}"></script>
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>


    @yield('scripts')
</body>
</html>
