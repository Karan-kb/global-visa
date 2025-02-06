@extends('layouts.frontend')
@section('title')
Message from Chairman
@endsection

@section('content')

<!--breadcrumb section start-->
<section class="agency breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="breadcrumb-text text-center">Discover Us</h2>
          <ul class="breadcrumb justify-content-center">

            <li><a href="#">{{$chairman->title}}</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>

  <!--breadcrumb section end-->

  <section class="event about bg" style="background:whitesmoke;">
      <div class="container">
          <div class="row">

              <div class="col-lg-12 offset-lg-1 col-md-12">
                  <div class="text-right chairman-img" >
                      <div class="announcer-img">
                          <img alt="" class="img-fluid" src="../assets/images/event/1.jpg">
                          <img alt="" class="img-fluid" src="../assets/images/event/1.jpg">
                          <img alt="" class="img-fluid" data-tilt="" data-tilt-max="3" data-tilt-perspective="500" data-tilt-speed="400" src="/storage/page_banners/{{$chairman->image}}" style="will-change: transform; transform: perspective(500px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                      </div>
                  </div>
              </div>
              <div class="col-xl-5 offset-xl-1 col-lg-12 col-md-12">
                  <div class="abouts center-text">
                      <div class="format">
                          <div class="format-small-text">
                              <!-- <h6 class="text-white borders-before text-uppercase"><span>Prof.John</span></h6> -->
                          </div>
                          <div class="format-head-text">
                              <h3 class="about-font-header text-white chairman-message">{{$chairman->title}}</h3>
                          </div>
                          <div class="format-sub-text">
                              

                          {!!$chairman->body!!}
                            
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

@endsection