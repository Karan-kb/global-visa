@extends('basic_pages.layouts.master')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h2>
                    {{ $page->pagecontents[0]->title ?? '' }}</h2>
                <p>
                    {!! $page->pagecontents[0]->content ?? '' !!}
                </p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i> About Page</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="choose-area bg-img pt-90" style="background-image:url({{ asset('frontend/img/bg/bg-8.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="about-chose-us pt-120">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single-about-chose-us mb-95">
                                    <div class="about-choose-img">
                                        <img src="{{ asset('storage/page/' . ($page->pagecontents[1]->image ?? 'frontend/img/icon-img/service-9.png')) }}"
                                            alt="">
                                    </div>
                                    <div class="about-choose-content text-light-blue">
                                        <h3>
                                            {{ $page->pagecontents[1]->title ?? '' }}</h3>
                                        <p>{!! $page->pagecontents[1]->content ?? '' !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-about-chose-us mb-95 about-negative-mrg">
                                    <div class="about-choose-img">
                                        <img src="{{ asset('storage/page/' . ($page->pagecontents[2]->image ?? 'frontend/img/icon-img/service-9.png')) }}"
                                            alt="">
                                    </div>
                                    <div class="about-choose-content text-yellow">
                                        <h3>{{ $page->pagecontents[2]->title ?? '' }} </h3>
                                        <p>{!! $page->pagecontents[2]->content ?? '' !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-about-chose-us mb-95">
                                    <div class="about-choose-img">
                                        <img src="{{ asset('storage/page/' . ($page->pagecontents[3]->image ?? 'frontend/img/icon-img/service-9.png')) }}"
                                            alt="">
                                    </div>
                                    <div class="about-choose-content text-blue">
                                        <h3>{{ $page->pagecontents[3]->title ?? '' }}</h3>
                                        <p>{!! $page->pagecontents[3]->content ?? '' !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-about-chose-us mb-95 about-negative-mrg">
                                    <div class="about-choose-img">
                                        <img src="{{ asset('storage/page/' . ($page->pagecontents[4]->image ?? 'frontend/img/icon-img/service-9.png')) }}"
                                            alt="">
                                    </div>
                                    <div class="about-choose-content text-green">
                                        <h3>
                                            {{ $page->pagecontents[4]->title ?? '' }}</h3>
                                        <p>{!! $page->pagecontents[4]->content ?? '' !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="about-img">
                        <img src="{{ asset('storage/page/' . ($page->pagecontents[5]->image ?? 'frontend/img/icon-img/service-9.png')) }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="video-area bg-img pt-270 pb-270"
        style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[6]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
        <div class="video-btn-2">
            <a class="video-popup" href="{{ $page->pagecontents[6]->link ?? '' }}">
                <img class="animated" src="{{ asset('frontend/img/icon-img/viddeo-btn.png') }}" alt="">
            </a>
        </div>
    </div>

    <div class="fun-fact-area bg-img pt-130 pb-100" style="background-image:url({{ asset('frontend/img/bg/bg-6.jpg') }});">
        <div class="container">
            <div class="section-title-3 section-shape-hm2-2 white-text text-center mb-100">
                <h2>
                    {{ $page->pagecontents[7]->title ?? '' }}</h2>
                <p>{!! $page->pagecontents[7]->content ?? '' !!} </p>
            </div>
            <div class="row">
                @if ($achievements)
                    @foreach ($achievements as $schievement)
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-count mb-30 count-one count-white">
                                <div class="count-img">
                                    <img src="{{ asset($schievement->image) }}" alt="">
                                </div>
                                <div class="count-content">
                                    <h2 class="count">{{ $schievement->count }}</h2>
                                    <span>{{ $schievement->title }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
  
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // Initialize the main testimonial text slider
            $('.testimonial-text-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.testimonial-image-slider' // Link with the image slider
            });

            // Initialize the testimonial image slider
            $('.testimonial-image-slider').slick({
                slidesToShow: 3, // Adjust as needed
                slidesToScroll: 1,
                asNavFor: '.testimonial-text-slider', // Link with the text slider
                dots: false,
                centerMode: true,
                focusOnSelect: true
            });
        });
    </script>
@endpush
