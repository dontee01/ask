@extends('layouts.layout')
@section('title', 'Ask Question')
@section('content')

<div class="main-content-area">

    <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 co-xs-12 text-left">
            <h1>Ask Your Question</h1>
          </div>
          <!-- end col -->
          <div class="col-md-6 col-sm-5 co-xs-12 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Pages</a>
                </li>
                <li class="active">Ask Question</li>
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

    <!-- =-=-=-=-=-=-= Post Question  =-=-=-=-=-=-= -->
    <section class="section-padding-80 white" id="post-question">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-8 ">

            <div class="box-panel">

              <h2>Ask Your Question</h2>
              <p>Try to be as brief as possible with your question. </p>
              <hr>

              <form class="margin-top-40" method="post" action="{{ url('ask') }}">
              	{{ csrf_field() }}
                <div class="form-group">
                  <label>Question </label>
                  <input type="text" name="question" placeholder="Try to be as brief as possible" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label>Channels</label>
                  <select class="questions-category form-control" name="channel" required="required">
                    <option value="">Select a channel</option>
                    @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}">{{ $channel->channel }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Additional Detials</label>
                  <textarea cols="12" rows="12" placeholder="Post Additional Details Here..." id="details" name="details" class="form-control"></textarea>
                </div>

                <button class="btn btn-primary pull-right">Publish Your Question</button>

              </form>

            </div>
          </div>

          <!-- Blog Right Sidebar -->
          <div class="col-sm-12 col-xs-12 col-md-4">

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
          <!-- Blog Right Sidebar End -->
          <div class="clearfix"></div>
        </div>
      </div>
      <!-- end container -->
    </section>

  </div>


@endsection