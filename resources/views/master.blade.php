<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

    {{--  <script type="text/javascript" src="{{ asset('js/manifest.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>  --}}
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>