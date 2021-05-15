<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('customStyle')
    {{-- <link href="{{ asset('css/fitri/style.css') }}" rel="stylesheet"> --}}
</head>

<body>
    <div id="app">
        {{-- Navigation --}}
        @if (!auth()->guard('admin')->check())
        @include('layouts.navigation')
        @endif
        <main>
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
