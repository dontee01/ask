@extends('layouts.layout')
@section('title', 'Home')
@section('content')


  <div id="home" class="full-section parallax-home">
    <div class="slider-caption">
      <h1> Are You Looking for help ? </h1>
      <h2> <span>Join  Our Community</span></h2>
      <a class="btn btn-transparent" href="http://templates.scriptsbundle.com/join"> Join Now </a> <a class="btn btn-light" href="http://templates.scriptsbundle.com/series"> Start Browsing </a> </div>
  </div>

<div class="main-content-area">
	<section class="section-padding-10 white">
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
        </div>
    </section>
    
    <!-- =-=-=-=-=-=-= How It Work  =-=-=-=-=-=-= -->
    <section class="custom-padding" id="how-it-work">
      <div class="container">
        <!-- title-section -->
        <div class="main-heading text-center">
          <h2>How  It Works </h2>
          <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
          </div>
          <p>Cras varius purus in tempus porttitor ut dapibus efficitur sagittis cras vitae lacus metus nunc vulputate facilisis nisi
            <br> eu lobortis erat consequat ut. Aliquam et justo ante. Nam a cursus velit</p>
        </div>

        <!-- End title-section -->

        <div class="row">
          <div class="col-sm-4 col-md-4 col-xs-12  center-responsive"> <img src="images/step1.png" class="img-responsive" alt="">
            <h4><a href="{{ url('register') }}">Create An Account</a></h4>
          </div>
          <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow"> <img src="images/step2.png" class="img-responsive" alt="">
            <h4><a href="{{ url('ask') }}">Ask Your Question</a></h4>
          </div>
          <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow"> <img src="images/step3.png" class="img-responsive" alt="">
            <h4><a href="{{ url('answers') }}"> Find Your Solution</a></h4>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= How It Work  End =-=-=-=-=-=-= -->

    <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
    <section class="section-padding-80 white" id="latest-post">
      <div class="container">
        <!-- title-section -->
        <div class="main-heading text-center">
          <h2>Recent Questions</h2>
          <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
          </div>
          <p>Cras varius purus in tempus porttitor ut dapibus efficitur sagittis cras vitae lacus metus nunc vulputate facilisis nisi
            <br> eu lobortis erat consequat ut. Aliquam et justo ante. Nam a cursus velit</p>
        </div>
        <!-- End title-section -->

        <div class="row">
          <!-- Content Area Bar -->
          <div class="col-md-8 col-sm-12">
            <div class="listing">
              <!-- Question Area Panel -->
              <div class="listing-area">

                <!-- Question Listing -->
                <div class="listing-grid ">
                  <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="Martina Jaz" href="#"><img alt="" class="correct img-responsive center-block" src="images/authors/1.jpg">
                      </a>
                      <span class="tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                    <div class="col-md-7 col-sm-8  col-xs-12">
                      <h3><a  href="#"> 	
                        Php recursive function not working right</a></h3>
                      <div class="listing-meta">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>
                        <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span>

                      </div>

                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-12">
                      <ul class="question-statistic">

                        <li class="active">
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>2</span></a>
                        </li>
                        <li>
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-md-10 col-sm-10  col-xs-12">
                      <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                      <div class="pull-right tagcloud">
                        <a href="#">Php</a>
                        <a href="#">recursive</a>
                        <a href="#">error</a>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- Question Listing End -->

                <!-- Question Listing -->
                <div class="listing-grid ">
                  <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="James John" href="#"><img alt="" class="correct img-responsive center-block" src="images/authors/2.jpg">
                      </a>
                      <span class="tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                    <div class="col-md-7 col-sm-8  col-xs-12">
                      <h3><a  href="#"> 	
                        How to retrieve RSS from multiple website</a></h3>
                      <div class="listing-meta">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>
                        <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span>

                      </div>

                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-12">
                      <ul class="question-statistic">

                        <li class="active">
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>177</span></a>
                        </li>
                        <li>
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>2</span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-md-10 col-sm-10  col-xs-12">
                      <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                      <div class="pull-right tagcloud">
                        <a href="#">rss-reader</a>
                        <a href="#">web</a>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- Question Listing End -->

                <!-- Question Listing -->
                <div class="listing-grid ">
                  <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="Jessica" href="#"><img alt="" class="img-responsive center-block" src="images/authors/3.jpg">
                      </a>
                    </div>
                    <div class="col-md-7 col-sm-8  col-xs-12">
                      <h3><a  href="#"> 	
                        Change navbar color in Twitter Bootstrap 3</a></h3>
                      <div class="listing-meta">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>
                        <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span>
                      </div>

                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-12">
                      <ul class="question-statistic">

                        <li class="active">
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>9</span></a>
                        </li>
                        <li>
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-md-10 col-sm-10  col-xs-12">
                      <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                      <div class="pull-right tagcloud">
                        <a href="#">bootstrap</a>
                        <a href="#">navbar</a>
                        <a href="#">color</a>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- Question Listing End -->

                <!-- Question Listing -->
                <div class="listing-grid ">

                  <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="Muhammad Umair" href="#"><img alt="" class="correct img-responsive center-block" src="images/authors/4.jpg">
                      </a>
                      <span class="tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                    <div class="col-md-7 col-sm-8  col-xs-12">
                      <h3><a  href="#"> 	
                        Choosing bootstrap vs material design</a></h3>
                      <div class="listing-meta">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>
                        <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span>

                      </div>

                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-12">
                      <ul class="question-statistic">

                        <li class="active">
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>332</span></a>
                        </li>
                        <li>
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>55</span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-md-10 col-sm-10  col-xs-12">
                      <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                      <div class="pull-right tagcloud">
                        <a href="#">bootstrap</a>
                        <a href="#">material</a>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- Question Listing End -->

                <!-- Question Listing -->
                <div class="listing-grid ">
                  <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="Emily Copper" href="#"><img alt="" class="img-responsive center-block" src="images/authors/5.jpg">
                      </a>
                    </div>
                    <div class="col-md-7 col-sm-8  col-xs-12">
                      <h3><a  href="#"> 	
                        How to automatically generates HTML table by JavaScript?</a></h3>
                      <div class="listing-meta">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>
                        <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span>

                      </div>

                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-12">
                      <ul class="question-statistic">

                        <li class="active">
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>122</span></a>
                        </li>
                        <li>
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>2</span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-md-10 col-sm-10  col-xs-12">
                      <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                      <div class="pull-right tagcloud">
                        <a href="#">jquery</a>
                        <a href="#">html 5</a>
                        <a href="#">table</a>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- Question Listing End -->

                <!-- Question Listing -->
                <div class="listing-grid ">
                  <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="Randy Axe" href="#"><img alt="" class=" correct img-responsive center-block" src="images/authors/6.jpg">
                      </a>
                      <span class="tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                    <div class="col-md-7 col-sm-8  col-xs-12">
                      <h3><a  href="#"> 	
                        HasManyThrough with another relationship in Laravel 5.2</a></h3>
                      <div class="listing-meta">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>
                        <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span>

                      </div>

                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-12">
                      <ul class="question-statistic">

                        <li class="active">
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>342</span></a>
                        </li>
                        <li>
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>77</span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-md-10 col-sm-10  col-xs-12">
                      <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                      <div class="pull-right tagcloud">
                        <a href="#">laravel</a>
                        <a href="#">Php</a>
                        <a href="#">eloquent</a>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- Question Listing End -->

                <!-- Question Listing -->
                <div class="listing-grid ">
                  <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="Bella John" href="#"><img alt="" class=" correct img-responsive center-block" src="images/authors/7.jpg">
                      </a>
                      <span class="tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                    <div class="col-md-7 col-sm-8  col-xs-12">
                      <h3><a  href="#"> 	
                        Php login system not working correctly </a></h3>
                      <div class="listing-meta">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>
                        <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-12">
                      <ul class="question-statistic">

                        <li class="active">
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>1</span></a>
                        </li>
                        <li>
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-md-10 col-sm-10  col-xs-12">
                      <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                      <div class="pull-right tagcloud">
                        <a href="#">Php</a>
                        <a href="#">login</a>

                      </div>
                    </div>

                  </div>
                </div>
                <!-- Question Listing End -->

              </div>

              <!-- Pagination View More -->
              <div class="text-center clearfix">
                <button class="btn btn-primary btn-lg">View All Questions</button>
              </div>
              <!-- Pagination View More End -->

              <!-- Question Area Panel End -->
            </div>
          </div>
          <!-- Content Area Bar End -->

          <!-- Right Sidebar -->
          <div class="col-md-4 col-sm-12 col-xs-12 clearfix">

            <!-- sidebar -->
            <div class="side-bar">

              <!-- widget -->
              <div class="widget">
                <h2>Top Authors</h2>
                <hr class="widget-separator no-margin">
                <div class="media-group">
                  <div class="media-group-item">
                    <div class="media">
                      <div class="media-left">
                        <div class="avatar avatar-md avatar-circle"> <img alt="" class="" src="images/authors/1.jpg"> </div>
                      </div>
                      <div class="media-body">
                        <h5 class="media-heading"><a href="profile.html">John Doe</a></h5>
                        <small class="media-meta">Software Engineer</small>
                        <div class="points"><span>Points : </span>9958</div>
                      </div>
                    </div>
                  </div>
                  <!-- .media-group-item -->

                  <div class="media-group-item">
                    <div class="media">
                      <div class="media-left">
                        <div class="avatar avatar-md avatar-circle"> <img alt="" class="" src="images/authors/2.jpg"> </div>
                      </div>
                      <div class="media-body">
                        <h5 class="media-heading"><a href="profile.html">Adam Khaury</a></h5>
                        <small class="media-meta">Web Designer</small>
                        <div class="points"><span>Points : </span>7910</div>
                      </div>
                    </div>
                  </div>
                  <!-- .media-group-item -->

                  <div class="media-group-item">
                    <div class="media">
                      <div class="media-left">
                        <div class="avatar avatar-md avatar-circle"> <img alt="" class="" src="images/authors/3.jpg"> </div>
                      </div>
                      <div class="media-body">
                        <h5 class="media-heading"><a href="profile.html">John Doe</a></h5>
                        <small class="media-meta">Web Developer</small>
                        <div class="points"><span>Points : </span>7458</div>
                      </div>
                    </div>
                  </div>
                  <!-- .media-group-item -->

                  <div class="media-group-item">
                    <div class="media">
                      <div class="media-left">
                        <div class="avatar avatar-md avatar-circle"> <img alt="" class="" src="images/authors/4.jpg"> </div>
                      </div>
                      <div class="media-body">
                        <h5 class="media-heading"><a href="profile.html">Sara Smith</a></h5>
                        <small class="media-meta">UI/UX Designer</small>
                        <div class="points"><span>Points : </span>6458</div>
                      </div>
                    </div>
                  </div>
                  <!-- .media-group-item -->

                  <div class="media-group-item">
                    <div class="media">
                      <div class="media-left">
                        <div class="avatar avatar-md avatar-circle"> <img alt="" class="" src="images/authors/5.jpg"> </div>
                      </div>
                      <div class="media-body">
                        <h5 class="media-heading"><a href="profile.html">Dani Smith</a></h5>
                        <small class="media-meta">Teacher Assistant</small>
                        <div class="points"><span>Points : </span>6115</div>
                      </div>
                    </div>
                  </div>
                  <!-- .media-group-item -->

                  <div class="media-group-item">
                    <div class="media">
                      <div class="media-left">
                        <div class="avatar avatar-md avatar-circle"> <img alt="" class="" src="images/authors/6.jpg"> </div>
                      </div>
                      <div class="media-body">
                        <h5 class="media-heading"><a href="profile.html">Sally Sally</a></h5>
                        <small class="media-meta">Teacher Assistant</small>
                        <div class="points"><span>Points : </span>5558</div>
                      </div>
                    </div>
                  </div>
                  <!-- .media-group-item -->
                  <div class="media-group-item">
                    <div class="media">
                      <div class="media-left">
                        <div class="avatar avatar-md avatar-circle"> <img alt="" class="" src="images/authors/7.jpg"> </div>
                      </div>
                      <div class="media-body">
                        <h5 class="media-heading"><a href="profile.html">Sally Sally</a></h5>
                        <small class="media-meta">Teacher Assistant</small>
                        <div class="points"><span>Points : </span>5558</div>
                      </div>
                    </div>
                  </div>
                  <!-- .media-group-item -->
                  <div class="media-group-item">
                    <div class="media">
                      <div class="media-left">
                        <div class="avatar avatar-md avatar-circle"> <img alt="" class="" src="images/authors/8.jpg"> </div>
                      </div>
                      <div class="media-body">
                        <h5 class="media-heading"><a href="profile.html">Sally Sally</a></h5>
                        <small class="media-meta">Teacher Assistant</small>
                        <div class="points"><span>Points : </span>5558</div>
                      </div>
                    </div>
                  </div>
                  <!-- .media-group-item -->
                </div>
              </div>
              <!-- widget end -->

              <!-- widget -->
              <div class="widget">
                <div class="recent-comments">
                  <h2>Recent Comments</h2>
                  <hr class="widget-separator no-margin">
                  <ul id="recentcomments">
                    <li class="recentcomments"> <span class="comment-author-link">John Doe</span> on <a href="#">bootstrap vs foundation</a> </li>
                    <li class="recentcomments"> <span class="comment-author-link">Emily Copper</span> on <a href="#">how to get data from URL in PHP</a> </li>
                    <li class="recentcomments"> <span class="comment-author-link">Alex Martin</span> on <a href="#">My SQL PHP Multi Layer Drop Down List from Databse</a> </li>
                    <li class="recentcomments"> <span class="comment-author-link">Tina Martin</span> on <a href="#">PHP Multi Layer Drop Down List from Databse</a> </li>
                    <li class="recentcomments"> <span class="comment-author-link">Alex Henz</span> on <a href="#">Can't use custom width with Angular-Slick</a> </li>
                    <li class="recentcomments"> <span class="comment-author-link">Coty Embry</span> on <a href="#">Use Digital Ocean to create node.js server or creating website on Wordpress?</a> </li>
                  </ul>
                </div>
              </div>
              <!-- widget end -->

            </div>
            <!-- sidebar end -->
          </div>
          <!-- Right Sidebar End -->
          <div class="clearfix"></div>
        </div>
      </div>
      <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Latest Questions  End =-=-=-=-=-=-= -->

    <!-- =-=-=-=-=-=-= Testimonials =-=-=-=-=-=-= -->
    <section data-stellar-background-ratio="0.1" class="testimonial-bg parallex">
      <div class="container">

        <!-- Row -->
        <div class="row">

          <!-- Blog Grid -->
          <div class="col-md-8 ">
            <div id="owl-slider" class="happy-client">
              <div class="item"> <i class="fa fa-quote-left"> </i>
                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took. </p>
                <div class="client-info-wrap clearfix">
                  <div class="client-img"> <img class="img-circle" src="../../../theemon.com/d/designagency/LivePreview/assets/images/client-img-two.jpg" alt="" /> </div>
                  <div class="client-info"> <strong> Muhammad Umair </strong> <i class="fa fa-star grey-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> </div>
                </div>
              </div>
              <div class="item"> <i class="fa fa-quote-left"> </i>
                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took. </p>
                <div class="client-info-wrap clearfix">
                  <div class="client-img"> <img class="img-circle" src="../../../theemon.com/d/designagency/LivePreview/assets/images/client-img-two.jpg" alt="" /> </div>
                  <div class="client-info"> <strong> Muhammad Umair </strong> <i class="fa fa-star grey-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Blog Grid -->

          <!-- Blog Grid -->
          <div class="col-md-4">
            <div class="success-stories">
              <div class="main-heading text-center">
                <h2>Success Stories</h2>
                <hr class="main">
                <p>Cras varius purus in tempus porttitor ut dapibus efficitur sagittis cras vitae lacus metus nunc vulputate facilisis nisi
                  <br> eu lobortis erat consequat ut. Aliquam et justo ante. Nam a cursus velit</p>
              </div>
            </div>
          </div>
          <!-- Blog Grid -->

          <div class="clearfix"></div>
        </div>

        <!-- Row End -->
      </div>
      <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Testimonials  =-=-=-=-=-=-= -->

    <!-- =-=-=-=-=-=-= Our Clients =-=-=-=-=-=-= -->
    <section class="custom-padding" id="clients">
      <div class="container">

        <!-- Row -->
        <div class="row">

          <!-- col-md-2 client-block -->
          <div class="col-md-2 col-xs-6 col-sm-4 client-block">

            <!-- client-item client-item-style-2 -->
            <div class="client-item client-item-style-2">
              <a title="Client Logo" href="#"> <img alt="Clients Logo" src="images/clients/client_5.png"> </a>
            </div>
            <!-- /client-item client-item-style-2 -->

          </div>
          <!-- /col-md-2 client-block -->

          <!-- col-md-2 client-block -->
          <div class="col-md-2 col-xs-6 col-sm-4 client-block">

            <!-- client-item client-item-style-2 -->
            <div class="client-item client-item-style-2">
              <a title="Client Logo" href="#"> <img alt="Clients Logo" src="images/clients/client_6.png"> </a>
            </div>
            <!-- /client-item client-item-style-2 -->

          </div>
          <!-- /col-md-2 client-block -->

          <!-- col-md-2 client-block -->
          <div class="col-md-2 col-xs-6 col-sm-4 client-block">

            <!-- client-item client-item-style-2 -->
            <div class="client-item client-item-style-2">
              <a title="Client Logo" href="#"> <img alt="Clients Logo" src="images/clients/client_7.png"> </a>
            </div>
            <!-- /client-item client-item-style-2 -->

          </div>
          <!-- /col-md-2 client-block -->

          <!-- col-md-2 client-block -->
          <div class="col-md-2 col-xs-6 col-sm-4 client-block">

            <!-- client-item client-item-style-2 -->
            <div class="client-item client-item-style-2">
              <a title="Client Logo" href="#"> <img alt="Clients Logo" src="images/clients/client_8.png"> </a>
            </div>
            <!-- /client-item client-item-style-2 -->

          </div>
          <!-- /col-md-2 client-block -->

          <!-- col-md-2 client-block -->
          <div class="col-md-2 col-xs-6 col-sm-4 client-block">

            <!-- client-item client-item-style-2 -->
            <div class="client-item client-item-style-2">
              <a title="Client Logo" href="#"> <img alt="Clients Logo" src="images/clients/client_9.png"> </a>
            </div>
            <!-- /client-item client-item-style-2 -->

          </div>
          <!-- /col-md-2 client-block -->

          <!-- col-md-2 client-block -->
          <div class="col-md-2 col-xs-6 col-sm-4 client-block">

            <!-- client-item client-item-style-2 -->
            <div class="client-item client-item-style-2">
              <a title="Client Logo" href="#"> <img alt="Clients Logo" src="images/clients/client_10.png"> </a>
            </div>
            <!-- /client-item client-item-style-2 -->

          </div>
          <!-- /col-md-2 client-block -->

        </div>
        <!-- Row End -->

      </div>
      <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Our Clients -end =-=-=-=-=-=-= -->
  </div>

@endsection