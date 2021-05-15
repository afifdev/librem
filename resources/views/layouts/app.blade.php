<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/indah/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fitri/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nafis/memStyle.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        {{-- Navigation --}}
        @include('layouts.navigation')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/pooper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
