<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('header')
</head>

<body>
    @yield('content')
    @yield('script')
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
