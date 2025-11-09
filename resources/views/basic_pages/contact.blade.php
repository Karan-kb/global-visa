@extends('basic_pages.layouts.master')


@section('meta_content')
    <!-- HTML Meta Tags -->
    <title>{{ $page->title ?? '' }} - {{ App\Helpers\Helper::getInfoValue('name') ?? ' ' }}</title>
    <meta name="description" content="{{ $page->seo_description ?? '' }}">
    <meta name="keywords" content="{{ $page->seo_keyword ?? '' }}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page->seo_title ?? '' }} - {{ App\Helpers\Helper::getInfoValue('name') ?? '' }}">
    <meta property="og:description" content="{{ $page->seo_description ?? '' }}">
    <meta property="og:image" content="{{ asset('storage/page/seo_' . $page->seo_image) }}">
    <meta property="og:image:alt"
        content="{{ $page->seo_title }} - {{ App\Helpers\Helper::getInfoValue('name') ?? '' }} Logo">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ url()->current() }}">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title"
        content="{{ $page->seo_title ?? '' }} - {{ App\Helpers\Helper::getInfoValue('name') ?? '' }}">
    <meta name="twitter:description" content="{{ $page->seo_description ?? '' }}">
    <meta name="twitter:image" content="{{ asset('storage/page/seo_' . $page->seo_image) }}">
    <!--seo by susan paudel-->
@endsection

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-5 pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h2>{{ $page->pagecontents[0]->title ?? '' }}</h2>
                <p>{!! $page->pagecontents[0]->content ?? '' !!}
                </p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i>Contact Us</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-area pt-130 pb-130">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="contact-map mr-70">
                        <div id="map">
                            {!! App\Helpers\Helper::getInfoValue('map') !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-form">
                        <div class="contact-title mb-45">
                            <h2>{{ $page->pagecontents[1]->title ?? '' }}</h2>
                            <p>{!! $page->pagecontents[1]->content ?? '' !!}.</p>
                        </div>
                        <form action="{{ route('contact-us') }}" method="post" enctype="multipart/form-data"
                            id="regsiter-form">
                            @csrf
                            <input name="name" placeholder="Name*" type="text" required>
                            <input name="email" placeholder="Email*" type="email" required>

                            <input name="subject" placeholder="Subject*" type="text">
                            <textarea name="messege" placeholder="Message"></textarea>
                            <button class="g-recaptcha submit btn-style" data-sitekey="{{ config('services.recaptcha.site_key') }}"
                                data-callback='onSubmit' data-action='submit' type="submit">SEND MESSAGE</button>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-info-area bg-img pt-180 pb-140 default-overlay"
        style="background-image:url({{ asset('storage/page/' . $page->pagecontents[2]->image ?? 'frontend/img/icon-img/service-9.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-contact-info mb-30 text-center">
                        <div class="contact-info-icon">
                            <span><i class="fa fa-calendar-o"></i></span>
                        </div>
                        <p>{{ App\Helpers\Helper::getInfoValue('address') }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-contact-info mb-30 text-center">
                        <div class="contact-info-icon">
                            <span><i class="fa fa-calendar-o"></i></span>
                        </div>
                        <div class="contact-info-phn">
                            <div class="info-phn-title">
                                <span>Phone : </span>
                            </div>
                            <div class="info-phn-number">
                                <p>{{ App\Helpers\Helper::getInfoValue('phone') }}</p>
                                <p>{{ App\Helpers\Helper::getInfoValue('mobile') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-contact-info mb-30 text-center">
                        <div class="contact-info-icon">
                            <span><i class="fa fa-calendar-o"></i></span>
                        </div>
                        <a href="#">{{ App\Helpers\Helper::getInfoValue('email') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($brands && $brands->isNotEmpty())
        <div class="brand-logo-area pt-130 pb-130">
            <div class="container">
                <div class="brand-logo-active owl-carousel">

                    @foreach ($brands as $brand)
                        <div class="single-brand-logo">
                            <a href="#"><img
                                    src="{{ asset('storage/brand/' . $brand->image ?? 'frontend/img/icon-img/service-9.png') }}"
                                    alt=""></a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    @endif


    
@endsection
<script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("regsiter-form").submit();
        }
    </script>