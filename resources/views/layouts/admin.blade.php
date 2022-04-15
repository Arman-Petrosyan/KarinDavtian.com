<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token">

    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <style>
        body {
            background: white;
            color: black;
        }

        #app {
            position: relative;
            display: inline-block;
            width: 800px;
            height: auto;
            left: 50%;
            transform: translate(-50%, 0);
                -ms-transform: translate(-50%, 0);
                -moz-transform: translate(-50%, 0);
                -webkit-transform: translate(-50%, 0);
                -o-transform: translate(-50%, 0);
        }

        .invalid-feedback {
            display: block !important;
        }

        .image-upload-input {
            opacity: 0;
        }

        .upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                -moz-transform: translateY(-50%);
                -webkit-transform: translateY(-50%);
                -o-transform: translateY(-50%);
        }

        .image-area {
            position: relative;
            display: none;
            padding: 1rem;
            width: 348px;
            height: 314px;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: inherit;
            border: 2px dashed rgba(255, 255, 255, 0.7);
        }

        .image-area::before {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                -moz-transform: translate(-50%, -50%);
                -webkit-transform: translate(-50%, -50%);
                -o-transform: translate(-50%, -50%);
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-item {
            position: relative;
            display: block;
            padding: 1rem;
            width: 200px;
            height: 166px;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: inherit;
            margin-bottom: 30px;

        }

        .is-main-block-for-exists {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                -moz-transform: translateY(-50%);
                -webkit-transform: translateY(-50%);
                -o-transform: translateY(-50%);
            right: -180px;
        }

        .link-primary {
            color: #0d6efd;
            font-size: 20px;
            text-decoration: none !important;
        }

        .link-primary:focus,
        .link-primary:hover {
            color: #0a58ca;
        }
    </style>
    @yield('styles')

    <title>{{ $title ?? 'KarinDavtian.com' }}</title>
</head>
<body>
    @include('components.nav')
    <div id="app" class="mt-5 mb-5">
        @include('components.alerts')
        @yield('content')
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/fontawesome.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
