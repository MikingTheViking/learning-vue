<!DOCTYPE html>
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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('inclusions.navbar')
    <div id="app">
        
        <div class="container-fluid">

            <h1>Vue.js <small class="text-muted">A learning exercise with the Viking</small></h1>

            <h2>The Essentials</h2>

            @include('learnvue-sections.essentials.what-is-it')
            @include('learnvue-sections.essentials.vue-instance')
            @include('learnvue-sections.essentials.template-syntax')
            @include('learnvue-sections.essentials.computed-properties-and-watchers')
            @include('learnvue-sections.essentials.class-and-style-bindings')
            @include('learnvue-sections.essentials.conditional-rendering')
            @include('learnvue-sections.essentials.list-rendering')
            @include('learnvue-sections.essentials.event-handling')
            @include('learnvue-sections.essentials.form-input-bindings')
            @include('learnvue-sections.essentials.components')

            <h2>Animations &amp; Transitions</h2>
            @include('learnvue-sections.transitions-and-animations.list-transitions')



        </div>
        
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/learnvue.js') }}"></script>

    @include('inclusions.browsersync')
</body>
</html>
