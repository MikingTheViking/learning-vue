<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('inclusions.favicons')

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Learning Vue') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    </head>
    <body>
        @include('inclusions.navbar')
        
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <h1>MikingTheViking's</h1>    
            </div>
            <div class="d-flex justify-content-center">
                <h2>Web Dev Resources</h2>
            </div>
            <div class="d-flex justify-content-center" id="container">
            
            </div>
        </div>

        <!-- Scripts -->

        <script src="{{ asset('js/welcome.js') }}"></script>

        @include('inclusions.browsersync')

    </body>
</html>
