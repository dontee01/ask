@extends('layouts.layout')
@section('title', 'Questions')
@section('content')

<div class="full-section search-section-listing">
    <div class="search-area container">
      <h3 class="search-title">Have a Question?</h3>
      <p class="search-tag-line">If you have any question you can ask below or enter what you are looking for!</p>
      <form autocomplete="off" method="get" class="search-form clearfix" id="search-form">
        <input type="text" title="* Please enter a search term!" placeholder="Type your search terms here" class="search-term " autocomplete="off">
        <input type="submit" value="Search" class="search-btn">
      </form>
    </div>
  </div>
  <!-- =-=-=-=-=-=-= Search Bar END =-=-=-=-=-=-= -->
  <!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
  <div class="main-content-area">
    <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 co-xs-12 text-left">
            <h1>All Questions</h1>
          </div>
          <!-- end col -->
          <div class="col-md-6 col-sm-5 co-xs-12 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Pages</a>
                </li>
                <li class="active">Questions</li>
              </ol>
            </div>
            <!-- end bread -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
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
    <!-- =-=-=-=-=-=-= Page Breadcrumb End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
    <section class="section-padding-80 white" id="questions">
      <div class="container">
        <!-- Row -->
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <div class="listing">
              <!-- Question Area Panel -->
              <div class="listing-area">

                @foreach ($questions as $question)
                <div class="listing-grid ">
                  <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                      <a data-toggle="tooltip" data-placement="bottom" data-original-title="{{ $question->username }}" href="{{ url('user/'.$question->username) }}"><img alt="" class="correct img-responsive center-block" src="images/authors/1.jpg">
                      </a>
                      @if ($question->answer_id)
                      <span class="tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                      @endif
                    </div>
                    <div class="col-md-7 col-sm-8  col-xs-12">
                      <h3><a href="{{ url('question/'.$question->question_number.'/'.$question->title_url) }}"> 	
                        {{ $question->question }}</a></h3>
                      <div class="listing-meta">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{ \Carbon::createFromTimeStamp(strtotime($question->date))->diffForHumans() }}</span>
                        <span><i class="fa fa fa-eye" aria-hidden="true"></i> {{ $question->view_count }} Views</span>

                      </div>

                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-12">
                      <ul class="question-statistic">

                        <li class="active">
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>{{ $question->answers_count }}</span></a>
                        </li>
                        <li>
                          <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>{{ $question->view_count }}</span></a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-md-10 col-sm-10  col-xs-12">
                      <p>{{ $question->question_details }}</p>
                      <div class="pull-right tagcloud">
                        <!-- <a href="#">Php</a>
                        <a href="#">recursive</a>
                        <a href="#">error</a> -->
                      </div>
                    </div>

                  </div>
                </div>

                @endforeach
                {{ $questions->links() }}

              </div>

            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <!-- sidebar -->
            <div class="side-bar">
              <!-- widget -->
              <div class="widget">
                <div class="recent-comments">
                  <h2>Hot Questions</h2>
                  <hr class="widget-separator no-margin">
                  <ul>
                  	@foreach ($hot_questions as $hot)
                    <li><a href="{{ url('question/'.$hot->question_number.'/'.$hot->title_url) }}">{{ $hot->question }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <!-- sidebar end -->
          </div>
        </div>
        <!-- Row End -->
      </div>
      <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Latest Questions  End =-=-=-=-=-=-= -->
  </div>

@endsection