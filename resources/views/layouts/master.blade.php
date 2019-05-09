<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Olivier Hassaoui St-Amour') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app" class="full-page">
        <div class="columns full-page">
            <div class="column is-9 p-none full-height">
                <section class="hero is-medium is-light">
                    <div class="hero-body p-t-lg-i p-b-lg-i">
                        <h1 class="title ohs-title p-b-md">
                            <span class="contrast">@yield('title')</span>
                        </h1>
                        <h2 class="subtitle">
                            <i><span>@yield('subtitle')</span></i>
                        </h2>
                    </div>
                </section>
                <br />
                @yield('content')
            </div>
            <sidebar class="column is-3 p-none m-none" current="{{$current}}"></sidebar>
        </div>
    </div>
</body>
</html>
