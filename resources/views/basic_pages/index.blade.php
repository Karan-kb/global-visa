@extends('basic_pages.layouts.master')


@section('meta_content')
    <!-- HTML Meta Tags -->
    <title>{{ App\Helpers\Helper::getInfoValue('name') ?? '' }}</title>
    <meta name="description" content="{{ $page->seo_description ?? '' }}">
    <meta name="keywords" content="{{ $page->seo_keyword ?? ' ' }}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ App\Helpers\Helper::getInfoValue('name') ?? '' }}">
    <meta property="og:description" content="{{ $page->seo_description ?? ' ' }}">
    <meta property="og:image" content="{{ asset('storage/page/seo_' . $page->seo_image) }}">
    <meta property="og:image:alt" content="{{ App\Helpers\Helper::getInfoValue('name') ?? ' ' }} Logo">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ url()->current() }}">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ App\Helpers\Helper::getInfoValue('name') ?? ' ' }}">
    <meta name="twitter:description" content="{{ $page->seo_description ?? '' }}">
    <meta name="twitter:image" content="{{ asset('storage/page/seo_' . $page->seo_image) }}">
    <!--seo by susan paudel-->
@endsection

@push('css')
    <style>
        .testi-content-wrap {
            display: none;
            /* Initially hidden */
        }

        .sin-testi-image {
            cursor: pointer;
            /* Indicates that the image is clickable */
        }

        .popup {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            /* Semi-transparent background */
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            position: absolute;
           
            padding: 20px;
            border-radius: 5px;
            max-width: 90%;
            /* General max-width */
            max-height: 90%;
            /* General max-height */
            text-align: center;
            display: flex;
            /* Enable flexbox */
            flex-direction: column;
            /* Stack items vertically */
            justify-content: center;
            /* Center vertically */
            align-items: center;
            /* Center horizontally */
        }

        .popup-image {
            max-width: 650px;
          
            width: 100%;
           
            height: auto;
            max-height:auto ;
            /* Maintain aspect ratio */
            border-radius: 5px;
            display: block;
            /* Ensure proper rendering */
        }

        .close {
            position: relative;
            top: 29px;
            right: -312px;
            color: #000;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            background: white;
        }

        border-radius: 27% .close:hover {
            color: #000;
        }

        /* Media query for mobile screens */
        @media (max-width: 768px) {
            .popup-content {
                max-width: 95%;
                /* Tighter fit on mobile */
                padding: 10px;
                /* Reduced padding */
                max-height: 85%;
                /* Adjusted for mobile */
            }

            .popup-image {
                width: 100%;
                /* Full width of container on mobile */
                height: auto;
                /* Maintain aspect ratio */
                max-height: 100%;
                /* Fit within popup-content */
                object-fit: contain;
                /* Ensure full image is visible */
                border-radius: 5px;
            }

            .close {
                position: absolute;
                top: 12px;
                right: 1px;
                color: #000;
                font-size: 30px;
                font-weight: bold;
                cursor: pointer;
                background: white;
                border-radius: 50%;
            }
        }
    </style>
@endpush

@section('content')
    <div id="preloader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <div id="imagePopup" class="popup">
        <div class="popup-content">
            <span id="closePopup" class="close">×</span>
            <img src="{{ asset('frontend\img\pop-up\pop_up.jpg') }}" style="height:400px; width:650px;" alt="Popup Image"
                class="popup-image">
        </div>
    </div>

    <div class="slider-area">
        <div class="slider-active owl-carousel">
            @if ($slider)
                @foreach ($slider as $sd)
                    <div class="single-slider slider-height-1 bg-img"
                        style="background-image:url({{ asset('storage/slider/' . $sd->image) }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9 col-md-7 col-12 col-sm-12">
                                    <div class="slider-content slider-animated-1 pt-230">
                                        @if ($sd->heading)
                                            <h1 class="animated">{{ $sd->heading }}</h1>
                                        @endif
                                        @if ($sd->title)
                                            <p class="animated">{{ $sd->title }}</p>
                                        @endif
                                        @if ($sd->button_text && $sd->button_url)
                                            <div class="slider-btn">
                                                <a class="animated default-btn btn-green-color"
                                                    href="{{ $sd->button_url }}">{{ $sd->button_text }}</a>
                                                <!-- <a class="animated default-btn btn-white-color"
                                                                                                                    href="{{ route('contact') }}">CONTACT US</a> -->
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="{{ asset('storage/slider/' . $sd->image_1) }}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            {{-- <div class="single-slider slider-height-1 bg-img"
                style="background-image:url({{ asset('frontend/img/slider/slider-1.jpg') }});">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-7 col-12 col-sm-12">
                            <div class="slider-content slider-animated-1 pt-230">
                                <h1 class="animated">MakeYour Own World</h1>
                                <p class="animated">Grab your opportunity to study abroad !! </p>
                                <div class="slider-btn">
                                    <a class="animated default-btn btn-green-color" href="{{ route('about') }}">ABOUT
                                        US</a>
                                    <a class="animated default-btn btn-white-color" href="{{ route('contact') }}">CONTACT
                                        US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-single-img slider-animated-1">
                        <img class="animated" src="{{ asset('frontend/img/slider/single-slide-1.png') }}" alt="">
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="choose-us section-padding-1">
        <div class="container-fluid">
            <div class="row no-gutters choose-negative-mrg">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="single-choose-us choose-bg-light-blue">
                        <div class="choose-img">
                            <img src="{{ asset('storage/page/' . ($page->PageContents[0]->image ?? asset('frontend/img/icon-img/service-2.png'))) }}"
                                class="animated" alt="">
                        </div>
                        <div class="choose-content">
                            <h3>{{ $page->PageContents[0]->title ?? '' }}</h3>
                            <p>{!! $page->PageContents[0]->content ?? '' !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="single-choose-us choose-bg-yellow">
                        <div class="choose-img">
                            <img class="animated"
                                src="{{ asset('storage/page/' . ($page->PageContents[1]->image ?? asset('frontend/img/icon-img/service-2.png'))) }}"
                                alt="">
                        </div>
                        <div class="choose-content">
                            <h3>{{ $page->PageContents[1]->title ?? '' }}</h3>
                            <p>{!! $page->PageContents[1]->content ?? '' !!}.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="single-choose-us choose-bg-red">
                        <div class="choose-img">
                            <img class="animated"
                                src="{{ asset('storage/page/' . ($page->PageContents[2]->image ?? asset('frontend/img/icon-img/service-2.png'))) }}"
                                alt="">
                        </div>
                        <div class="choose-content">
                            <h3>{{ $page->PageContents[2]->title ?? '' }}</h3>
                            <p>{!! $page->PageContents[2]->content ?? '' !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="single-choose-us choose-bg-green">
                        <div class="choose-img">
                            <img class="animated"
                                src="{{ asset('storage/page/' . ($page->PageContents[3]->image ?? asset('frontend/img/icon-img/service-2.png'))) }}"
                                alt="">
                        </div>
                        <div class="choose-content">
                            <h3>{{ $page->PageContents[3]->title ?? '' }}</h3>
                            <p>{!! $page->PageContents[3]->content ?? '' !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us pt-70 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about-content">
                        <div class="section-title section-title-green mb-30">
                            <h2>{{ $page->PageContents[4]->title ?? '' }}</h2>
                            <p>{{ $page->PageContents[4]->subtitle ?? '' }} </p>
                        </div>
                        <p>{!! $page->PageContents[4]->content ?? '' !!}</p>
                        <div class="about-btn mt-45">
                            <a class="default-btn" href="{{ route('about') }}">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about-img default-overlay">
                        <img src="{{ asset('storage/page/' . ($page->PageContents[4]->image ?? asset('frontend/img/icon-img/service-2.png'))) }}"
                            alt="">
                        <a class="video-btn video-popup" href="{{ $page->PageContents[4]->link ?? '' }}">
                            <img class="animated" src="{{ asset('frontend/img/icon-img/video.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="event-area bg-img pt-90 pb-90" style="background: #f4f9ff;">
        <div class="container">
            <div class="section-title mb-75">
                <h2>{{ $page->PageContents[5]->title ?? '' }}</h2>
                <p>{!! $page->PageContents[5]->subtitle ?? '' !!}</p>
            </div>
            <div class="row g-4">
                @if ($destinations)
                    @php
                        $counter = 0; // Initialize a counter to track the pattern
                    @endphp
                    @foreach ($destinations as $destination)
                        @if ($counter < 2)
                            <!-- First 2 items: col-md-6 -->
                            <div class="col-md-6">
                                <div class="study-card">
                                    <a href="{{ route('destination-details', $destination->slug) }}">
                                        <img src="{{ isset($destination->feature_image) && $destination->feature_image ? asset('storage/' . $destination->feature_image) : asset('frontend/img/icon-img/service-2.png') }}"
                                            alt="Banner">
                                        "
                                        alt="Study in {{ $destination->title }}">
                                    </a>
                                    <div class="overlay">
                                        <a href="{{ route('destination-details', $destination->slug) }}">
                                            {{ $destination->title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @php $counter++; @endphp
                        @elseif ($counter < 5)
                            <!-- Next 3 items: col-md-4 -->
                            <div class="col-md-4">
                                <div class="study-card">
                                    <a href="{{ route('destination-details', $destination->slug) }}">
                                        <img src="{{ isset($destination->feature_image) && $destination->feature_image ? asset('storage/' . $destination->feature_image) : asset('frontend/img/icon-img/service-2.png') }}"
                                            alt="Banner">
                                        alt="Study in {{ $destination->title }}">
                                    </a>
                                    <div class="overlay">
                                        <a href="{{ route('destination-details', $destination->slug) }}">
                                            {{ $destination->title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @php $counter++; @endphp
                        @else
                            <!-- Reset the counter after 5 items -->
                            @php $counter = 0; @endphp
                            <div class="col-md-6">
                                <div class="study-card">
                                    <img src="{{ asset('storage/' . $destination->feature_image) }}"
                                        alt="Study in {{ $destination->title }}">
                                    <div class="overlay">
                                        <a href="{{ route('destination-details', $destination->slug) }}">
                                            {{ $destination->title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @php $counter++; @endphp
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="course-area pt-90 pb-90" style="background: #fff;">
        <div class="container">
            <div class="section-title mb-75">
                <h2>{{ $page->PageContents[12]->title ?? '' }}</h2>
                <p>{{ $page->PageContents[12]->subtitle ?? '' }}</p>
            </div>
            <div class="event-active owl-carousel nav-style-1 my-box-custom">
                @if ($services)
                    @foreach ($services as $service)
                        <div class="single-event event-white-bg">
                            <div class="event-img">
                                <a href="{{ route('service-details', $service->slug) }}">
                                    <img src="{{ asset('storage/services/' . $service->image) }}" alt=""
                                        style="width:368px; height:246px;">
                                </a>

                            </div>
                            <div class="event-content">
                                <h3><a href="{{ route('service-details', $service->slug) }}">{{ $service->title }}</a>
                                </h3>
                                {!! \Illuminate\Support\Str::limit($service->body, 165, '..') !!}
                                <div class="event-meta-wrap">

                                    <div class="">
                                        <a class="" href="{{ route('service-details', $service->slug) }}">
                                            Read More <span class="ms-1">→</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

    {{-- <div class="course-area pt-90 pb-90" style="background: #fff;">
        <div class="container">
            <div class="section-title mb-75">
                <h2>{{ $page->PageContents[6]->title ?? '' }}</h2>
                <p>{{ $page->PageContents[6]->subtitle ?? '' }}</p>
            </div>
            <div class="event-active owl-carousel nav-style-1 my-box-custom">
                @if ($courses)
                    @foreach ($courses as $course)
                        <div class="single-event event-white-bg">
                            <div class="event-img">
                                <a href="{{ route('course-details', $course->slug) }}">
                                    <img src="{{ asset('storage/' . $course->banner_image) }}" alt="">
                                </a>
                                
                            </div>
                            <div class="event-content">
                                <h3><a href="{{ route('course-details', $course->slug) }}">{{ $course->name }}</a></h3>
                                {!! \Illuminate\Support\Str::limit($course->description, 97, '') !!}
                                <div class="event-meta-wrap">
                                    <div class="event-meta">
                                        <i class="fa fa-clock-o" alt="Credit Hour"></i>

                                        <span>{{ $course->credit_hour }} Hours</span>
                                    </div>
                                    <div class="">
                                        <a class="" href="{{ route('course-details', $course->slug) }}">
                                            Read More <span class="ms-1">→</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div> --}}
    <div class="achievement-area pt-70 pb-120" style="background: #f4f9ff;">
        <div class="container">
            <div class="section-title mb-75">
                <h2>{{ $page->PageContents[7]->title ?? '' }}</h2>
                <p>{{ $page->PageContents[7]->subtitle ?? '' }}</p>
            </div>
            <div class="row">
                @if ($achievements)
                    @foreach ($achievements as $achievement)
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-count mb-30 count-one">
                                <div class="count-img green">
                                    <img src="{{ asset($achievement->image) }}" alt="">
                                </div>
                                <div class="count-content">
                                    <h2 class="count">{{ $achievement->count }} </h2><span class="inline-block">+</span>
                                    <span>{{ $achievement->title }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="testimonial-slider-wrap mt-45">
                <div class="testimonial-text-slider">
                    @if ($testimonials)
                        @foreach ($testimonials as $index => $testimonial)
                            <div class="testi-content-wrap" data-index="{{ $index }}">
                                <div class="testi-big-img">
                                    <img alt="" src="{{ asset('storage/testimonials/' . $testimonial->image) }}">
                                </div>
                                <div class="row g-0">
                                    <div class="ms-auto col-lg-6">
                                        <div class="testi-content bg-img default-overlay">
                                            <div class="quote-style quote-left">
                                                <i class="fa fa-quote-left"></i>
                                            </div>
                                            <p>{!! $testimonial->body !!}</p>
                                            <div class="testi-info">
                                                <h5>{{ $testimonial->name }}</h5>
                                                <span>{{ $testimonial->about }}</span>
                                            </div>
                                            <div class="quote-style quote-right">
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                            <div class="testi-arrow">
                                                <img alt=""
                                                    src="{{ asset('frontend/img/icon-img/testi-icon.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="testimonial-image-slider">
                    @if ($testimonials)
                        @foreach ($testimonials as $index => $testimonial)
                            <div class="sin-testi-image" data-index="{{ $index }}">
                                <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}"
                                    alt="Testimonial Image">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
    <div class="register-area bg-img pt-70 pb-70 register-area-custom">
        <div class="container">
            <div class="section-title-2 mb-75 white-text">
                <h2>{{ $page->PageContents[9]->title ?? '' }}</h2>
                <p>{{ $page->PageContents[9]->subtitle ?? '' }}</p>
            </div>
            <div class="register-wrap">
                <div id="register-3" class="mouse-bg">
                    <div class="winter-banner">
                        <img src="{{ asset('frontend/img/banner/regi-1.png') }}" alt="">
                        <div class="winter-content">
                            <span>{{ App\Helpers\Helper::getInfoValue('admission_season') }}</span>
                            <h3>{{ App\Helpers\Helper::getInfoValue('admission_year') }}</h3>
                            <span>ADMISSION </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-md-8">
                        <div class="register-form">
                            <h4>{{ $page->PageContents[9]->text ?? '' }}</h4>
                            <form action="{{ route('register-contact') }}" method="post" enctype="multipart/form-data"
                                id="contactt-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="first_name" placeholder="First Name" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="last_name" placeholder="Last Name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="phone" placeholder="Phone" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="email" placeholder="Email" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-form-style">
                                            <textarea name="messege" placeholder="Message"></textarea>
                                            <button class="g-recaptcha submit default-btn"
                                                data-sitekey="{{ config('services.recaptcha.site_key') }}"
                                                data-callback='onSubmit' data-action='submit' type="submit">SUBMIT
                                                NOW</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- <div class="event-area bg-img default-overlay pt-70 pb-70"
        style="background-image:url({{ asset('storage/page/' . ($page->PageContents[10]->image ?? asset('frontend/img/icon-img/service-2.png'))) }});">
        <div class="container">
            <div class="section-title mb-75">
                <h2>{{ $page->PageContents[10]->title ?? '' }}</h2>
                <p>{{ $page->PageContents[10]->subtitle ?? '' }} </p>
            </div>
            <div class="event-active owl-carousel nav-style-1">
                @if ($events)
                    @foreach ($events as $event)
                        <div class="single-event event-white-bg">
                            <div class="event-img">
                                <a href="{{ route('event-details', $event->slug) }}"><img
                                        src="{{ asset('storage/event/' . $event->image) }}" alt=""></a>
                                <div class="event-date-wrap">
                                    <span
                                        class="event-date">{{ \Carbon\Carbon::parse($event->created_at)->format('jS') }}</span>
                                    <span>{{ \Carbon\Carbon::parse($event->created_at)->format('M') }}</span>
                                </div>

                            </div>
                            <div class="event-content">
                                <h3><a href="{{ route('event-details', $event->slug) }}">{{ $event->title }}</a></h3>
                                <p> {!! \Illuminate\Support\Str::limit($event->body, 97, '') !!}</p>
                                <div class="event-meta-wrap">
                                    <div class="event-meta">
                                        <i class="fa fa-location-arrow"></i>
                                        <span>{{ $event->location }}</span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <div class="blog-area pt-70 pb-70">
        <div class="container">
            <div class="section-title mb-75">
                <h2>{{ $page->PageContents[11]->title ?? '' }}</h2>
                <p>{{ $page->PageContents[11]->subtitle ?? '' }} </p>
            </div>
            <div class="row">
                @if ($blogs)
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog mb-30">
                                <div class="blog-img">
                                    
                                    <a href="{{ route('blog-details', $blog->slug) }}"><img
                                            src="{{ asset('/storage/blog/' . $blog->image) }}" alt=""></a>
                                </div>
                                <div class="blog-content-wrap">
                                    <span>{{ $blog->category->namae ?? '' }}</span>
                                    <div class="blog-content">
                                        <h4><a href="{{ route('blog-details', $blog->slug) }}">{{ $blog->title }}</a>
                                        </h4>
                                        <p>{!! \Illuminate\Support\Str::limit($blog->body, 97, '') !!}</p>

                                    </div>
                                    <div class="blog-date">
                                        <a href="#"><i class="fa fa-calendar-o"></i>
                                            {{ $blog->created_at->format('F Y, d') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <div class="brand-logo-area pt-130 pb-130">
        <div class="container">
            <div class="brand-logo-active owl-carousel">
                @if ($brands)
                    @foreach ($brands as $brand)
                        <div class="single-brand-logo">
                            <a href="#"><img
                                    src="{{ asset('storage/brand/' . $brand->image ?? 'frontend/img/icon-img/service-9.png') }}"
                                    alt=""></a>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div> --}}
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <script>
        $(document).ready(function() {
            $("#course-slider").owlCarousel({
                items: 3, // Show 3 items at a time
                margin: 20, // Space between items
                loop: true, // Infinite loop
                autoplay: true, // Auto scroll
                autoplayTimeout: 5000, // Delay in ms for autoplay
                autoplayHoverPause: true, // Pause autoplay when mouse hovers
                responsive: {
                    0: {
                        items: 1, // 1 item for mobile
                    },
                    600: {
                        items: 2, // 2 items for small screens
                    },
                    1000: {
                        items: 3, // 3 items for larger screens
                    }
                }
            });
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("contactt-form").submit();
        }
    </script>
    <script>
        // JavaScript to handle popup on page load and close
        document.addEventListener('DOMContentLoaded', function() {
            const popup = document.getElementById('imagePopup');
            const close = document.getElementById('closePopup');

            // Show popup when page loads
            popup.style.display = 'flex';

            // Close popup when close button is clicked
            close.addEventListener('click', function() {
                popup.style.display = 'none';
            });

            // Close popup when clicking outside the content
            window.addEventListener('click', function(event) {
                if (event.target === popup) {
                    popup.style.display = 'none';
                }
            });
        });
    </script>
@endpush
