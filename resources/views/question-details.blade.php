@extends('layouts.layout')
@section('title', $question->question)
@section('content')

<div class="main-content-area">

    <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 co-xs-12 text-left">
            <h1>Question Detial</h1>
          </div>
          <!-- end col -->
          <div class="col-md-6 col-sm-5 co-xs-12 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Pages</a>
                </li>
                <li class="active">Question</li>
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

    <!-- =-=-=-=-=-=-= Question Details =-=-=-=-=-=-= -->

    <section class="section-padding-80 white question-details">
      <div class="container">
        <!-- Row -->
        <div class="row">
          <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
            <!-- Question Detail -->

            <!-- Question Listing -->
            <div class="listing-grid ">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h3><span > {{ $question->question }} </span></h3>
                  <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{ \Carbon::createFromTimeStamp(strtotime($question->created_at))->diffForHumans() }}</span> <span><i class="fa fa fa-eye" aria-hidden="true"></i> {{ $question->view_count }} Views</span> </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <p>{{ $question->question_details }}</p>
                  <!-- <div class="tagcloud"> <a href="#">html</a> <a href="#">css</a> <a href="#">bootstrap</a> </div> -->
                </div>
              </div>
            </div>
            <!-- Question Listing End -->

            <div class="clearfix"></div>
            <!-- Thread Reply -->
            <div class="thread-reply">
              <h2>Answers </h2>

              @foreach ($answers as $answer)
              <!-- Reply Grid -->
              <div class="media-block card-box ribbon-content">
              	@if ($question->answer_id == $answer->answer_id)
                <div class="ribbon base"><span>Correct Answer</span>
                </div>
                @endif

                <div class="media-left">
                  <a data-toggle="tooltip" data-placement="bottom" data-original-title="{{ $answer->username }}" href="{{ url('user/'.$answer->username) }}">
                    <img class="img-sm" alt="Profile Picture" src="images/authors/9.jpg">

                  </a>

                </div>
                <div class="media-body">
                  <div class="mar-btm">
                    <h4><a href="{{ url('user/'.$answer->username) }}" class="btn-link text-semibold media-heading box-inline">{{$answer->firstname.' '.$answer->lastname }}</a></h4>
                    <p class="text-muted text-sm">{{ \Carbon::createFromTimeStamp(strtotime($answer->date))->diffForHumans() }}</p>
                  </div>
                  <p>{{ $answer->answer }}</p>

                  <div class="pad-ver pull-right">

                    <a class="btn btn-sm btn-default btn-hover-success" data-toggle="tooltip" data-placement="bottom" data-original-title="Like This Answer" href="#"><i class="fa fa-thumbs-up"></i></a>
                    <a class="btn btn-sm btn-default btn-hover-danger" href="#" data-original-title="Spam" data-placement="bottom" data-toggle="tooltip"><i class="fa fa-thumbs-down"></i></a>

                    @if ($question->answer_id != $answer->answer_id)
                    @if (\Session::get('uid') == $question->user_id)
                    <a class="btn btn-sm btn-default btn-hover-primary" href="#">Mark As Correct</a>
                    @endif
                    @endif
                  </div>

                </div>
              </div>
              <!-- Reply Grid End -->

              @endforeach

              <div class="clearfix"></div>

              <form method="post" action="{{ url('answer/'.$question->question_number) }}">
              	{{ csrf_field() }}
                <div class="form-group">
                  <label>Post Answer</label>
                  <textarea cols="12" rows="7" class="form-control" name="answer" placeholder="Type your answer..." required="required">{{ old('answer') }}</textarea>
                </div>
                <input type="hidden" name="ssh" value="{{ $question->id }}">

                <button class="btn btn-primary btn-lg btn-block">Publish Your Answer</button>

              </form>

            </div>
            <!-- Thread Reply End -->
          </div>

          <!-- Right Sidebar -->
          <div class="col-md-4 col-sm-12 col-xs-12 clearfix">

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
              <!-- widget -->


            </div>
            <!-- sidebar end -->
          </div>
          <!-- Right Sidebar End -->

        </div>
        <!-- Row End -->
      </div>
    </section>

  </div>

@endsection