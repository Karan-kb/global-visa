@extends('layouts.frontend')
@section('title')
Our Team
@endsection

@section('content')


<!--breadcrumb section start-->
<section class="agency breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="breadcrumb-text text-center">Discover Us</h2>
          <ul class="breadcrumb justify-content-center">
            <li> Our Team</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!--breadcrumb section end-->
  <section class="agency format speaker expert-bg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="title title2 title-inner">
            <div class="main-title">
              <h2 class="font-primary borders text-center text-uppercase m-b-0"><span>{{$head->title}}</span>
              </h2>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4">
          <div class="format-container">
            <h6 class="borders-before text-uppercase font-600">
              <span>Meet our Expert</span>
            </h6>
            <div class="format-head-text">
              <h2>We Will Ready For <span class="block-span">Your Services</span>
              </h2>
            </div>
            <div class="format-sub-text">
              <p class="about-para">Lorem ipsum dolor sit amet, consectetur
                sed do eiusmod tempor incididunt.</p>
            </div>
            <a class=" btn btn-default btn-gradient text-white" href="#">view more</a>
          </div>
        </div>
        <div class="col-lg-9 col-md-8">
          <div class="owl-carousel owl-theme speaker-slider">
              @foreach($head->medias as $media)
              
            <div class="item speker-container">
              <div class="text-center">
                <div class="team-img">
                  <img alt="" class="img-fluid" src="/storage/gallery/{{$media->title}}">
                  <div class="overlay"></div>
                  <div class="social">
                    <ul>
                      <li>
                        <a href="#">
                          <i aria-hidden="true" class="fa fa-facebook center-content"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i aria-hidden="true" class="fa fa-twitter center-content"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i aria-hidden="true" class="fa fa-google center-content"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i aria-hidden="true" class="fa fa-globe center-content"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="employee">
                  <h5 class="e-name text-center font-secondary">{{$media->name}}</h5>
                  <h6 class="post text-center "> {{$media->designation}}</h6>
                </div>
              </div>
            </div>
            
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="event team-sec speaker set-relative" id="speaker">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="title title2 title-inner">
            <div class="main-title">
              <h2 class="font-primary borders text-center text-uppercase m-b-0"><span>{{$academic->title}}</span>
              </h2>
            </div>
          </div>
        </div>
        @foreach($academic->medias as $a)
       
        <div class="col-md-3 col-sm-6 speker-container">
          <div class="text-center">
            <div class="team-img">
              <img alt="" class="img-fluid" src="/storage/gallery/{{$a->title}}">
              <div class="overlay"></div>
              <div class="social">
                <ul>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-facebook center-content"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-twitter center-content"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-google center-content"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-globe center-content"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="employee">
              <h5 class="e-name text-center">{{$a->name}}</h5>
              <h6 class="post text-center ">{{$a->designation}}</h6>
            </div>
          </div>
        </div>
       
        @endforeach

      </div>
      <div class="row">
        <div class="col-12">
          <div class="title title2 title-inner">
            <div class="main-title">
              <h2 class="font-primary borders text-center text-uppercase m-b-0"><span>{{$creative->title}}</span>
              </h2>
            </div>
          </div>
        </div>
        @foreach($creative->medias as $c)
        <div class="col-md-3 col-sm-6 speker-container">
          <div class="text-center">
            <div class="team-img">
              <img alt="" class="img-fluid" src="/storage/gallery/{{$c->title}}">
              <div class="overlay"></div>
              <div class="social">
                <ul>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-facebook center-content"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-twitter center-content"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-google center-content"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-globe center-content"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="employee">
              <h5 class="e-name text-center">{{$c->name}}</h5>
              <h6 class="post text-center ">{{$c->designation}}</h6>
            </div>
          </div>
        </div>
      @endforeach
      </div>
      <div class="row mt-5">
        <div class="col-12">
          <div class="title title2 title-inner">
            <div class="main-title">
              <h2 class="font-primary borders text-center text-uppercase m-b-0"><span>{{$financial->title}}</span>
              </h2>
            </div>
          </div>
        </div>
        @foreach($financial->medias as $f)
        <div class="col-md-4 col-sm-6 speker-container">
          <div class="text-center">
            <div class="team-img">
              <img alt="" class="img-fluid" src="/storage/gallery/{{$f->title}}">
              <div class="overlay"></div>
              <div class="social">
                <ul>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-facebook center-content"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-twitter center-content"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-google center-content"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i aria-hidden="true" class="fa fa-globe center-content"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="employee">
              <h5 class="e-name text-center">{{$f->name}}</h5>
              <h6 class="post text-center ">{{$f->designation}}</h6>
            </div>
          </div>
        </div>
        @endforeach

      </div>

    </div>
    </div>
  </section>
  @endsection