<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <body>
        {{-- @include ('layouts.flash') --}}

        <div class="columns">
            <div class="column is-9">
                <section class="hero is-medium is-light">
                  <div class="hero-body p-t-lg-i p-b-lg-i">
                      <h1 class="title ohs-title p-b-md">
                          <span>@yield('title')</span>
                      </h1>
                      <h2 class="subtitle">
                          <span>@yield('subtitle')</span>
                      </h2>
                  </div>
                </section>
                <br />
                @yield('content')
            </div>
            <div class="column is-3 m-l-xl p-r-xl">
                @include('layouts.sidebar')
            </div>
        </div>

        <br />


        {{-- @include ('layouts.footer') --}}
    </body>

    </html>

</body>
</html>
