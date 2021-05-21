<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/globalstyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    @yield('header')
</head>

<body>
    @include('layouts.navigation')
    @yield('content')
    @yield('script')
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>