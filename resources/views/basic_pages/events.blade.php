@extends('layouts.frontend')
@section('title')
Events
@endsection

@section('content')

    <!--breadcrumb section start-->
  <section class="agency breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="breadcrumb-text text-center">Discovery</h2>
          <ul class="breadcrumb justify-content-center">

           <li><a href="#">Events</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!--breadcrumb section end-->

  <!-- section start -->
  <section class="agency blog blog-sec blog-sidebar">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
              @foreach($events as $events)
            <div class="col-md-4">
              <div class="blog-agency">
                <div class="blog-contain">
                  <img alt="" class="img-fluid" src="/storage/event/{{$events->image}}">
                  <div class="img-container center-content">
                    <div class="center-content">
                      <div class="blog-info">
                        <div class="m-b-20">
                          <div class="center-text"><i aria-hidden="true" class="fa fa-clock-o m-r-10"></i>
                            <h6 class="m-r-25 font-blog">{{ \Carbon\Carbon::parse($events->created_at)->format('j F, Y') }}</h6>
                            <i aria-hidden="true" class="fa fa-map-marker m-r-10"></i>
                            <h6 class="font-blog">{{$events->location}}</h6>
                          </div>
                        </div>
                        <h5 class="blog-head font-600">{{$events->title}}</h5>
                        
                        {!! Str::limit($events->body, 100) !!}
                        <div class="btn-bottom m-t-20">
                          <a class="text-uppercase" href="/blogs/{{$events->slug}}">read more</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
       
    </div>
  </section>
  <!-- section end -->

@endsection