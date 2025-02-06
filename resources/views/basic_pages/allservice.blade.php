@extends('layouts.frontend')
@section('title')
All Services
@endsection

@section('content')

     <!--breadcrumb section start-->
  <section class="agency breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="breadcrumb-text text-center">Services</h2>
          <ul class="breadcrumb justify-content-center">

            <li><a href="#"> All Servies</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!--breadcrumb section end-->


  <!--service app2 start-->
  <section class="app2 services">
    <div class="container">

      <div class="row">

      @foreach($s as $s)
        <div class="col-md-4 col-sm-6 service-container">
          <div class="service text-center">
            <div class="img-block">
              <a href="/services/{{$s->slug}}"><img alt="" class="service-img img-fluid" src="/storage/services/icon/{{$s->icon}}"></a>
            </div>
            <div class="service-feature">
              <a href="/services/{{$s->slug}}"><h4 class="feature-text text-center">{{$s->title}}</h4></a>
              <td>{!! Str::limit($s->body, 150) !!}</td>
            </div>
          </div>
        </div>
     @endforeach
      </div>

    </div>
  </section>
  <!--service app2 end-->

@endsection