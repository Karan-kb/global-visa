@extends('layouts.frontend')
@section('title')
Introduction
@endsection

@section('content')

<!--breadcrumb section start-->
<section class="agency breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="breadcrumb-text text-center">Discover Us</h2>
          <ul class="breadcrumb justify-content-center">

            <li><a href="#">Introduction</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>

  <!--breadcrumb section end-->

  <section class="portfolio-creative portfolio-section p-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 isotopeSelector">
          <img alt="" class="img-fluid intro-img" src="/storage/page_banners/{{$intro->image}}">
        </div>
        <div class="col-md-6 h-100 my-auto">
          <div class="portfolio-text m-auto ">
            <h2 class="head-text introduction-heading intro">
            INTRODUCTION
            </h2>
           
            
            {!! Str::limit($si->body, 1196) !!}
           
           
            <br>

            <a class="btn btn-default primary-btn radius-0 intro-btn" href="/intro_details/{{$intro->id}}">view more</a>
          </div>
        </div>
      </div>
      
      <div class="row">
          <div class="col-md-6 isotopeSelector order-md-2">
            <img alt="" class="img-fluid intro-img" src="/storage/page_banners/{{$objective->image}}">
          </div>
          <div class="col-md-6 h-100 my-auto custom-padding">
            <div class="portfolio-text m-auto ">
              <h2 class="head-text intro pl-0"> {{$objective->title}} </h2>
              {!!$objective->body!!}
            </div>
          </div>
        </div>

        <div class="row" style="padding:65px 00px;     background: #f8f8f8;">
          <div class="col-md-12  h-100 my-auto">
            <div class="portfolio-text m-auto text-center">
              <h2 class="head-text intro text-center"> {!!$fop->title!!} </h2>
              {!!$fop->body!!}
            </div>
          </div>
        </div>

      <div class="row">
        <div class="col-md-6  isotopeSelector order-md-2">
          <img alt="" class="img-fluid intro-img" src="/storage/page_banners/{{$bs->image}}">
        </div>
        <div class="col-md-6  h-100 my-auto custom-padding">
          <div class="portfolio-text m-auto ">
            <h2 class="head-text text-center bstrategy intro">
            {{$bs->title}}
            </h2>
           {!!$bs->body!!}
           
          </div>
        </div>

      </div>



      <div class="row" style="padding:65px 0px;     background: #f8f8f8;">

        <div class="col-md-12  h-100 my-auto">
          <div class="portfolio-text m-auto text-center">
            <h2 class="head-text intro">
            {{$br->title}}
            </h2>
            {!!$br->body!!}
         
          </div>
        </div>
      </div>



      <div class="row">
        <div class="col-md-6  isotopeSelector">
          <img alt="" class="img-fluid intro-img" src="/storage/page_banners/{{$csr->image}}">
        </div>
        <div class="col-md-6  h-100 my-auto">
          <div class="portfolio-text m-auto ">
            <h2 class="head-text introduction-heading intro">
            {{$csr->title}}
            </h2>
            {!!$csr->body!!}
            <!-- <a class="btn btn-default primary-btn radius-0 intro-btn" href="csr-inner.html">view more</a> -->
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection