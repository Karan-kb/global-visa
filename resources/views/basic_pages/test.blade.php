@extends('basic_pages.layouts.master')
@section('title')
    English Test
@endsection

@section('content')


    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-5 pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h2>{{ $page->pagecontents[0]->title ?? 'Test Preparation' }}</h2>
                <p>{!! $page->pagecontents[0]->content ?? 'Prepare for your tests with expert guidance and resources.' !!}</p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i>Test Preparation</span></li>
                </ul>
            </div>
        </div>
    </div>

  
    <div class="contact-area pt-130 pb-130">
        <div class="container">
            <div class="row">
                @foreach ($test as $test)
                    <div class="col-12 blog-sec blog-list mb-4">
                        <div class="blog-agency">
                            <div class="row blog-contain">
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="text-center">
                                        <img alt="Test Image" class="img-fluid blog-img"
                                            src="/storage/test/{{ $test->image }}">
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-8 col-md-6 my-auto text-left">
                                    <div class="blog-info">
                                        <h5 class="blog-head font-600">{{ $test->title }}</h5>
                                        {!! $test->body !!}
                                        <div class="btn-bottom mt-3">
                                            <a class="btn btn-default primary-btn radius-0 intro-btn text-uppercase scholar-btn"
                                                href="/test/{{ $test->title }}">Read More</a>
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



@endsection
