@extends('layouts.layout')
@section('title', $username."'s Profile")
@section('content')

<div class="main-content-area"> 

	<!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
<section class="page-title">
    <div class="container">
        <div class="row">  
            <div class="col-md-6 col-sm-7 text-left">
                <h1>Questions</h1>
            </div><!-- end col -->
            <div class="col-md-6 col-sm-5 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Profile</li>
                    </ol>
                </div><!-- end bread -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
    
    <!-- =-=-=-=-=-=-= Page Breadcrumb End =-=-=-=-=-=-= -->

    
  <!-- =-=-=-=-=-=-= User Profile =-=-=-=-=-=-= -->
    <section id="user-profile" class="user-profile parallex">
      <div class="container">
        <!-- Row -->
        <div class="row">

          <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="profile-sec ">
              <div class="profile-head">
                <div class="col-md-6 col-xs-12 col-sm-6 no-padding">
                  <div class="profile-avatar">
                    <span><img class="img-responsive img-circle" alt="" src="images/authors/author-large.jpg"></span>
                    <div class="profile-name">
                      <h3>User Profile</h3>
                      <i>{{ $username }}</i>
                      <ul class="social-btns">
                        <li><a href="#" title=""><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#" title=""><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li><a href="#" title=""><i class="fa fa-twitter"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 no-padding">
                  <ul class="profile-count">
                    <li>{{ $total_questions }}<i>Questions</i></li>
                    <li>{{ $total_answers }}<i>Answers</i></li>
                  </ul>
                  <!-- <ul class="profile-connect">
                    <li><a title="" href="#">Follow</a>
                    </li>
                    <li><a title="" href="#">Hire Me</a>
                    </li>
                  </ul> -->
                </div>
              </div>
            </div>
            <!-- Profile Sec -->
          </div>

        </div>
        <!-- Row End -->
      </div>
      <!-- end container -->
    </section>
    
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

    <!-- =-=-=-=-=-=-= User Profile end =-=-=-=-=-=-= -->
    
     <!-- =-=-=-=-=-=-= User History =-=-=-=-=-=-= -->
    
    <section class="section-padding-80 white">
    
            <div class="container"> 
	            <div class="row">
	            
	            
	            
		            <div class="col-md-12 col-xs-12 col-sm-12">
			            @foreach ($questions as $question)
						<div class="listing-grid">
							<div class="row">
								<div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
									<a data-toggle="tooltip" data-placement="bottom" data-original-title="{{ $username }}" href="{{ url('user/'.$question->username) }}">
										<img alt="" class="img-responsive center-block" src="images/authors/13.jpg">
									</a>
								</div>
								<div class="col-md-7 col-sm-8  col-xs-12">
									<h3><a  href="{{ url('question/'.$question->question_number.'/'.$question->title_url) }}"> {{ $question->question }}</a></h3>
									<div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{ \Carbon::createFromTimeStamp(strtotime($question->date))->diffForHumans() }}</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> {{ $question->view_count }} Views</span> 
									</div>
								</div>
								<div class="col-md-3 col-sm-2 col-xs-12">
									<ul class="question-statistic">
										<li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>{{ $question->answers_count }}</span></a> 
										</li>
										<li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>{{ $question->thumbsup_count }}</span></a> 
										</li>
									</ul>
								</div>
								<div class="col-md-10 col-sm-10  col-xs-12">
									<p>{{ $question->question_details }}</p>
									<!-- <div class="pull-right tagcloud"> <a href="#">Php</a>  <a href="#">recursive</a>  <a href="#">error</a> </div> -->
								</div>
							</div>
						</div>
						@endforeach
						{{ $questions->links() }}
		            </div>
	            </div>
	        </div>
    
    </section>
    
</div>

@endsection