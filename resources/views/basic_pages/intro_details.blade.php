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
                    <h2 class="breadcrumb-text text-center">Discovery</h2>
                    <ul class="breadcrumb justify-content-center">


                        <li><a href="#">Introduction</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--breadcrumb section end -->

    <!-- section start -->
    <section class="agency blog-sec blog-sidebar single_blog_item">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{--   <div class="blog-block m-b-20">
            <div class="blog-box">
              <div class="overflow-hidden">
                <img alt="blog" class="img-fluid blur-up lazyload" style="margin-left:25%; height:500px; width:auto;" src="/storage/page_banners/{{$intro->image}}">
              </div>
            </div>
          </div> --}}
                    <div class="blog-text">

                        <div class="blog-divider"></div>
                        <div class="blog-description">
                            {!! $intro->body !!}

                            </h5>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- section end -->
@endsection
