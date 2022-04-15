<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token">
    <link rel="shortcut icon" href="{{ asset('img/icons/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .last-element {
            opacity: .3;
        }
    </style>
    @yield('styles')

    <title>{{ $title ?? 'KarinDavtian.com' }}</title>
</head>
<body>
    <div id="preloader">
        <div id="preloader-wrapper">
            <div id="loader"></div>
        </div>
    </div>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
