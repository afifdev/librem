<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title', config('app.name', 'Librem')) </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    @yield('header')
</head>

<body>

    @yield('content')

    @yield('script')
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
