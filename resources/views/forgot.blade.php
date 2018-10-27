<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Title -->
    <title>Forgot | {{ env('SITE_NAME') }} </title>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Do you have all it takes to win big prizes with your skills, How intelligent are you, Do you think you can win the top prize">
    <meta name="keywords" content="{{ env('SITE_NAME') }}, Reward, Incentivized learning, Purpose, Computer Based Tests, CBT">
    
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">
    
    <!-- CSS Stylesheet -->
    <link  href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' media='all' />

    <link  href="{{ asset('css/owl.carousel.css') }}" rel='stylesheet' type='text/css' media='all' />

    <link  href="{{ asset('css/font-awesome.css') }}" rel='stylesheet' type='text/css' media='all' />

    <link  href="{{ asset('css/loader.css') }}" rel='stylesheet' type='text/css' media='all' />

    <link  href="{{ asset('css/docs.css') }}" rel='stylesheet' type='text/css' media='all' />
    
    <link  href="{{ asset('css/custom.css') }}" rel='stylesheet' type='text/css' media='all' />

    

    <!-- <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:100,200,300,400,500,700,800,900%7CPT+Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> -->
   

</head>
    
<body>
    <div class="wapper">
    <!--    <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div> -->
        
        @include('layouts.header.header')

        <section class="banner inner-page">
            <div class="banner-img"><img src="images/banner/register-bannerImg.jpg" alt=""></div>
            <div class="page-title">    
                <div class="container">
                    <h1>Forgot Password</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a>Forgot password </a></li>
                </ul>
            </div>
        </section>
        <section class="">
            <div class="panel-heading">
                @include('common.errors')

                @if (Session::has('flash_message'))
                <div align="center" class="alert alert-danger alert-dismissable mw800 center-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" color="blue">x</button>
                    <strong>{{Session::get('flash_message')}}</strong>
                </div>
                @endif

                @if (Session::has('flash_message_success'))
                <div align="center" class="alert alert-success alert-dismissable mw800 center-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" color="blue">x</button>
                    <strong>{{Session::get('flash_message_success')}}</strong>
                </div>
                @endif

                @if (Session::has('flash_message_verified_error'))
                <div align="center" class="alert alert-danger alert-dismissable mw800 center-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" color="blue">x</button>
                    <strong>{{Session::get('flash_message_verified_error')}}</strong>
                </div>
                @endif

                @if (Session::has('flash_message_verified_success'))
                <div align="center" class="alert alert-success alert-dismissable mw800 center-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" color="blue">x</button>
                    <strong>{{Session::get('flash_message_verified_success')}}</strong>
                </div>
                @endif

            </div>
        </section>
        <section class="login-view">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="section-title">
                            <h2>Forgot Password</h2>
                            <p>Enter your registered email</p>

                        </div>
                        <form method="post" action="{{ url('forgot') }}">
                        {{ csrf_field() }}
                            <div class="input-box">
                                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="submit-slide">
                                <input type="submit" value="Submit" class="btn">
                                
                            </div>
                            <p class="margin medium-small">Not a member yet? Click <a href="{{url('register')}}">here</a> to register</p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.header.footer')

    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"> </script>
    <script src="{{ asset('js/bootstrap.js') }}"> </script>
    <script src="{{ asset('js/owl.carousel.js') }}"> </script>
    <script src="{{ asset('js/jquery.form-validator.min.js') }}"> </script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="{{ asset('js/map-styleMain.js') }}"> </script>
    <script src="{{ asset('js/placeholder.js') }}"> </script>
    <script src="{{ asset('js/coustem.js') }}"> </script>


</body>

</html>