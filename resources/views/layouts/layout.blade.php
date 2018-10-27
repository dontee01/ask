<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">

    <meta name="description" content="Can you answer our questions and win cash plus airtime? Sports, current affairs and general knowledge. How intelligent are you? Do you think you can win the top prize">
    <meta name="keywords" content="{{ env('SITE_NAME') }}, Reward, Incentivized learning, Purpose, Computer Based Tests, CBT">
    <title>@yield('title') | {{ env('SITE_NAME') }} </title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/et-line-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.style.css') }}">
    <!-- =-=-=-=-=-=-= Google Fonts =-=-=-=-=-=-= -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css"> -->

    <link type="text/css" rel="Stylesheet" href="{{ asset('css/styles/shCoreDefault.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap-dropdownhover.min.css') }}" />


  <!-- JavaScripts -->
  <script src="{{ asset('js/modernizr.js') }}"></script>

</head>

<body>
  <!-- =-=-=-=-=-=-= PRELOADER =-=-=-=-=-=-= -->
  <div class="preloader"><span class="preloader-gif"></span>
  </div>
  <!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
        @include('layouts.header.topbar')

        @include('layouts.header.navbar')

        @yield('content')
  <!-- =-=-=-=-=-=-= HEADER Navigation =-=-=-=-=-=-= -->
  
  <!-- HEADER Navigation End -->

  <!-- =-=-=-=-=-=-= HOME =-=-=-=-=-=-= -->
  <!-- =-=-=-=-=-=-= HOME END =-=-=-=-=-=-= -->

  <!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
  
  <!-- =-=-=-=-=-=-= Main Area End =-=-=-=-=-=-= -->

  <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
  
        @include('layouts.header.footer')

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.smoothscroll.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>

  <script src="{{ asset('js/jquery.countTo.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.js') }}"></script>
  <script src="{{ asset('js/jquery.appear.min.js') }}"></script>
  <script src="{{ asset('js/carousel.min.js') }}"></script>

  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-dropdownhover.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('scripts/shCore.js') }}"></script>

  <script type="text/javascript" src="{{ asset('scripts/shBrushPhp.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>