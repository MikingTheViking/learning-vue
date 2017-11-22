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
        <div class="container-fluid">

            <div class="page-header">
                <h1>Vue.js <small>A learning exercise with the Viking</small></h1>
            </div>

            @include('learnvue-sections.what-is-it')
            @include('learnvue-sections.vue-instance')
            @include('learnvue-sections.template-syntax')
            @include('learnvue-sections.computed-properties-and-watchers')
            @include('learnvue-sections.class-and-style-bindings')
            @include('learnvue-sections.conditional-rendering')
            @include('learnvue-sections.list-rendering')
            @include('learnvue-sections.event-handling')
            @include('learnvue-sections.form-input-bindings')
            @include('learnvue-sections.components')

        </div>
        
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/learnvue.js') }}"></script>

    @include('inclusions.browsersync')
</body>
</html>
