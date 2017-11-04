<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inclusions.navbar')
        
        <example-component></example-component>
        <child my-message="shit"></child>
        <category></category>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/learnvue.js') }}"></script>

    @include('inclusions.browsersync')
</body>
</html>
