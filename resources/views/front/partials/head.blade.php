<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>MyRentalHost</title>


    <!-- Scripts -->
    <!--script src="{{ asset('js/front.js') }}" defer></script-->

    <!-- Fonts -->
    <!-- Required Stylesheets -->
    <!-- Plugin Stylesheets first to ease overrides -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/fullcalendar/fullcalendar.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.css')}}" media="screen">



    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fonts/ptsans/stylesheet.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fonts/icomoon/style.css')}}" media="screen">

    <link rel="stylesheet" type="text/css" href="{{asset('css/mws-style.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/icons/icol16.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/icons/icol32.css')}}" media="screen">

    <!-- Demo Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}" media="screen">

    <!-- jQuery-UI Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('jui/css/jquery.ui.all.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('jui/jquery-ui.custom.css')}}" media="screen">

    <!-- Theme Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/mws-theme.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themer.css')}}" media="screen">


    
    <link href="css/timelineScheduler.css?id=6" rel="stylesheet" />
    <link href="css/timelineScheduler.styling.css?id=6" rel="stylesheet" />
    <link href="css/calendar.css?id=6" rel="stylesheet" />


    <!--link rel="shortcut icon" href="/images/favicon.ico"-->

    
    @include('front.layouts.jsconst')

    @stack('plugins')

</head>