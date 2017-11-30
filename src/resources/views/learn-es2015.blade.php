<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('inclusions.favicons')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Learning ES2015') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    @include('inclusions.navbar')
    <div id="app">
        
        <div class="container-fluid">

            <h1>ES2015 <small class="text-muted">A learning exercise with the Viking</small></h1>



        </div>
        
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/learn-es2015.js') }}"></script>

    @include('inclusions.browsersync')
</body>
</html>
