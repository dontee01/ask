
        <div class="quck-nav">
            <div class="container">
                <div class="contact-no"><a href="#"><i class="fa fa-map-marker"></i>{{ env('SITE_ADDRESS') }}</a></div>
                <div class="contact-no"><a href="#"><i class="fa fa-phone"></i>{{ env('MOBILE') }}</a></div>
                <div class="contact-no"><a href="#"><i class="fa fa-globe"></i>{{ env('SITE_NAME') }}</a></div>
                <div class="quck-right">
                    <div class="right-link"><a href="mailto:{{ env('SITE_EMAIL') }}"><i class="fa fa-headphones"></i>Online Support</a></div>
                    @if (Session::has('uid'))
                    <div class="right-link"><a href="{{ url('logout') }}"><i class="fa fa-handshake-o"></i>Logout</a></div>
                    @endif
                </div>
            </div>
        </div>
  
        
        <header id="header">
            <div class="container">
                <nav id="nav-main">
                    <div class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="cart-box">
                            <!-- <a href="cart"><i class="fa fa-shopping-basket"></i></a> -->
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class=""><a href="{{ url('/') }}">Home </a></li>
                                <li class=""><a href="{{ url('how-to') }}">How To Play </a></li>
                                @if (Session::has('uid'))
                                <li class=""><a href="{{ url('my-quiz') }}">My Quiz</a></li>
                                <li class=""><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class=""><a href="{{ url('leaderboard') }}">Leaderboard</a></li>
                                @endif
                                @if (!Session::has('uid'))
                                <li class=""><a href="mailto:{{ env('SITE_EMAIL') }}">Contact Us</a></li>
                                <li class=""><a href="{{ url('login') }}">Login</a></li>
                                <li class=""><a href="{{ url('register') }}">Register</a></li>
                                <li class=""><a href="{{ url('qbank') }}">Question Bank</a></li>
                                @else
                                <li class=""><a href="{{ url('quiz-fun-intro') }}">Play Now!</a></li>
                                <li class=""><a href="{{ url('account') }}">My Account</a></li>
                                <li class=""><a href="{{ url('qbank') }}">Question Bank</a></li>
                                <li class=""><a href="{{ url('logout') }}">Logout</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>