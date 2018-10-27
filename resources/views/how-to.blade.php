@extends('layouts.layout')
@section('title', 'How To')
@section('content')

<div class="main-content-area">

    <!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 co-xs-12 text-left">
            <h1>How To</h1>
          </div>
          <!-- end col -->
          <div class="col-md-6 col-sm-5 co-xs-12 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Pages</a>
                </li>
                <li class="active">How To</li>
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

    <!-- =-=-=-=-=-=-= Page Breadcrumb End =-=-=-=-=-=-= -->

    <!-- =-=-=-=-=-=-= Blog & News =-=-=-=-=-=-= -->
    <section id="blog" class="custom-padding white">
      <div class="container">
        <!-- Row -->

        <div class="row">
          <div class="col-sm-4 col-md-4 col-xs-12  center-responsive"> <img src="images/step1.png" class="img-responsive" alt="">
            <h4><a href="#">Create An Account</a></h4>
          </div>
          <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow"> <img src="images/step2.png" class="img-responsive" alt="">
            <h4><a href="#">Post Your Question</a></h4>
          </div>
          <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow"> <img src="images/step3.png" class="img-responsive" alt="">
            <h4><a href="#"> Find Your Solution</a></h4>
          </div>
          <div class="clearfix"></div>
        </div>

        <!-- Row End -->
      </div>
      <!-- end container -->
    </section>

  </div>

@endsection