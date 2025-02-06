@extends('layouts.frontend')
@section('title')
Our Pride
@endsection

@section('content')
<section class="agency breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="breadcrumb-text text-center">Discovery</h2>
          
          <ul class="breadcrumb justify-content-center">

            <li><a href="#">{{$pride->title}}</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!--breadcrumb section end-->


  <!-- gallery section start -->
  <section class="resume portfolio-section zoom-gallery">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2 text-center crew-brief-div">
              <div class="title title2">
              <div class="sub-title">
                <div>
                  <h2 class="head-text introduction-heading intro">{!!$pride->title!!}</h2>
                </div>
              </div>
            </div>
         {!!$pride->body!!}
        </div>
      </div>

    </div>
  </section>
  <div class="tabs-crew">
    <div class="row ">
      <div class="col-md-12">
        <div class="tabs">
          <ul class="tabs-nav">
            <li><a href="#tab-1">CREATIVITY</a></li>
            <li><a href="#tab-2">RESEARCH</a></li>
            <li><a href="#tab-3">EDUCATION</a></li>
            <li><a href="#tab-4">WRITING</a></li>
          </ul>
          <div class="container">


            <div class="tabs-stage">
              <div id="first-row">
                <div class="row custom-div" id="tab-1">
                  <div class="col-md-6 order-lg-1 order-1  p-0 isotopeSelector">
                    <img alt="" class="img-fluid" src="/storage/page_banners/{{$creativity->image}}">
                  </div>
                  <div class="col-md-6 order-lg-2 order-2 sub-col">
                    <h2 class="head-text introduction-heading intro">
                      {{$creativity->title}}
                    </h2>
                    {!!$creativity->body!!}

                  </div>
                </div>
              </div>
              <div id="second-row">
                <div class="row custom-div" id="tab-2">

                  <div class="col-md-6 order-lg-3 order-4 sub-col">
                    <h2 class="head-text">
                     {{$research->title}}
                    </h2>
                   {!!$research->body!!}


                  </div>
                  <div class="col-md-6 order-lg-4 order-3 p-0 isotopeSelector">
                    <img alt="" class="img-fluid" src="/storage/page_banners/{{$research->image}}">
                  </div>
                </div>
              </div>
              <div id="third-row">
                <div class="row custom-div" id="tab-3">
                  <div class="col-md-6 order-lg-5 order-5  p-0 isotopeSelector">
                    <img alt="" class="img-fluid" src="/storage/page_banners/{{$education->image}}">
                  </div>
                  <div class="col-md-6 order-lg-6 order-6 sub-col">
                    <h2 class="head-text">
                      {{$education->title}}
                    </h2>
                   {!!$education->body!!}


                  </div>
                </div>
              </div>
              <div id="fourth-row">
                <div class="row custom-div" id="tab-4">

                  <div class="col-md-6 order-lg-7 order-8 sub-col">
                    <h2 class="head-text">
                    {{$writing->title}}
                    </h2>
                    {!!$writing->body!!}


                  </div>
                  <div class="col-md-6 order-lg-8 order-7 p-0 isotopeSelector">
                    <img alt="" class="img-fluid" src="/storage/page_banners/{{$writing->image}}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection