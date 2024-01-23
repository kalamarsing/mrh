<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MyRentalHost</title>

    <!-- Scripts -->
    <script src="{{ asset('js/front.js') }}" defer></script>

    <!-- Fonts -->
    <!-- Required Stylesheets -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fonts/ptsans/stylesheet.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fonts/icomoon/style.css')}}" media="screen">
    <!--link rel="shortcut icon" href="/images/favicon.ico"-->


    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/mws-theme.css')}}" media="screen"></head>

<body>
    <div id="mws-login-wrapper">

        @yield('content')

    </div>


    @stack('javascripts-libs')
    @stack('javascripts')
</body>
</html>
