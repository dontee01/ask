<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="description" content="Do you have all it takes to win money and big prizes with your skills, How intelligent are you, Do you think you can win the top prize">
    <meta name="keywords" content="{{ env('SITE_NAME') }}, Reward, Incentivized learning, Purpose, Computer Based Tests, CBT">
    <meta name="author" content="{{ env('SITE_NAME') }}">
    <!-- Mobile Specific Metas -->
    
    <!-- Title -->
    <title>{{ env('SITE_NAME') }} </title>
    
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/Favicon.ico">
    
    <!-- CSS Stylesheet -->
    <link  href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' media='all' />

    <link  href="{{ asset('css/owl.carousel.css') }}" rel='stylesheet' type='text/css' media='all' />

    <link  href="{{ asset('css/font-awesome.css') }}" rel='stylesheet' type='text/css' media='all' />

    <!-- <link  href="{{ asset('css/loader.css') }}" rel='stylesheet' type='text/css' media='all' /> -->

    <link  href="{{ asset('css/docs.css') }}" rel='stylesheet' type='text/css' media='all' />
    
    <link  href="{{ asset('css/custom.css') }}" rel='stylesheet' type='text/css' media='all' />

    

    <!-- <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:100,200,300,400,500,700,800,900%7CPT+Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> -->
   

</head>
    
<body>
    <div class="wapper">
    <!--	<div id="loader-wrapper">
			<div id="loader"></div>
			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
		</div> -->
        
       @include('layouts.header.header')
          
        <section class="banner">
            <div class="banner-img"><img src="{{ asset('images/banner/banner-img1.jpg') }}" alt=""></div>
            <div class="banner-text">
                <div class="container">
                    <h1>welcome to {{ env('SITE_NAME') }}</h1>
                    <p> The more you learn, the more you earn</p>
                   
                    <div class="learning-btn">
                    @if (Session::has('uid'))
                        <a href="{{ url('quiz-fun-intro') }}" class="btn">Play Now!</a>
                    @else
                        <a href="{{ url('login') }}" class="btn">Play Now!</a>
                    @endif
                    </div>
                   
                </div>
            </div>
        </section>        

        <section class="graph-view">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <!-- <div class="graph-title">climbing the Percentile Ladder</div> -->
                        <img src="{{ asset('images/graph-img.png') }}" alt="">
                    </div>
                    <div class="col-sm-7">
                        <div class="point-view">
                            <div class="graph-point">
                                <i class="fa fa-users"></i>
                                <h4>It's so easy to win money and other prizes</h4>
                                <p>You can win money, mobile recharge and other fantastic prizes just by answering our questions. Play, learn and compete with other players</p><br />
                                <p>Your speed and accuracy is all that matters</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        @if (count($details) > 0)
        <section class="our-team">
            <div class="container">
                <div class="section-title">
                    <h2>{{ $details->name }}</h2>
                </div>

                <div class="container" align="">
                    <!-- <h1>Referral 1.0</h1> -->
                        <div class=" text-center">
                            <span class="text-warning"><b>{{ $details->details }}</b></span>
                        </div>
                    <h4> Top {{ $details->users_per_list }} Referrers</h4>
                   
                            <!-- <h4 class="team-member">Top Referrers</h4> -->

                            @if (empty($referrals))
                            <div>
                                --
                            </div><br />
                            @else
                            @foreach($referrals as $key=>$referral)
                            <div>
                                {{ucfirst($referral->ref_username)}} <span class="label label-default">({{$referral->total}})</span>
                            </div><br />

                            @endforeach
                            @endif
                            
                        <!-- </div> -->
                    <!-- </div> -->
                   
                </div>
            </div>

        </section>
        @endif

        <section class="preparation">
            <div class="container">
                <div class="section-title white">
                    <h2>Make Learning Awesome!</h2>
                    <p>{{ env('SITE_NAME') }}! brings fun into learning, for any subject, for all ages. Join us today, lets reward your intelligence. Play, Learn and Win big!</p>
                </div>
                <div class="preparation-view">
                    <div class="item">
                        <div class="icon"><img src="{{ asset('images/preparation-icon1.png') }}" alt=""></div>
                        <div class="course-name">Create an account </div>
                        <p>You need an active email address and mobile number to join the community.</p>
                    </div>
                    <div class="item">
                        <div class="icon"><img src="{{ asset('images/preparation-icon2.png') }}" alt=""></div>
                        <div class="course-name">Activate account</div>
                        <p>Check your inbox/spam folder for an email containing a link to activate your account</p>
                    </div>
                    <div class="item">
                        <div class="icon"><img src="{{ asset('images/preparation-icon1.png') }}" alt=""></div>
                        <div class="course-name">Play Quiz - It's free</div>
                        <p>Log in to your dashboard and compete with other users to win money and awesome prizes</p>
                    </div>
                    <div class="item">
                        <div class="icon"><img src="{{ asset('images/preparation-icon2.png') }}" alt=""></div>
                        <div class="course-name">Play & Win</div>
                        <p>Answer all questions with speed and accuracy, top the leaderboard and win thousands of naira amongst other cool prizes</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="start-learning">
            <div class="container">
                <p> Let's reward your Intelligence</p>
                <div class="learning-btn">
                @if (Session::has('uid'))
                <a href="{{ url('dashboard') }}" class="btn ">Start earning now</a>
                @else
                <a href="{{ url('login') }}" class="btn ">Start earning now</a>
                @endif
                </div>
            </div>
        </section>

<!-- FOOTER GOES HERE-->


        @include('layouts.header.footer')
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"> </script>
    <script src="{{ asset('js/bootstrap.js') }}"> </script>
    <script src="{{ asset('js/owl.carousel.js') }}"> </script>
    <script src="{{ asset('js/jquery.form-validator.min.js') }}"> </script>

    <script src="{{ asset('js/placeholder.js') }}"> </script>
    <script src="{{ asset('js/coustem.js') }}"> </script>


</body>

</html>
