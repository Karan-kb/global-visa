@extends('basic_pages.layouts.master')

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
                            {!! $page->pagecontents[1]->link ?? '' !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-form">
                        <div class="contact-title mb-45">
                            <h2>{{ $page->pagecontents[1]->title ?? '' }}</h2>
                            <p>{!! $page->pagecontents[1]->content ?? '' !!}.</p>
                        </div>
                        <form action="{{ route('contact-us') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="name" placeholder="Name*" type="text" required>
                            <input name="email" placeholder="Email*" type="email" required>
                            <input name="subject" placeholder="Subject*" type="text">
                            <textarea name="messege" placeholder="Message" ></textarea>
                            <button class="submit btn-style" type="submit">SEND MESSAGE</button>
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
    {{-- <div class="brand-logo-area pt-130 pb-130">
        <div class="container">
            <div class="brand-logo-active owl-carousel">
                @if ($brands)
                    @foreach ($brands as $brand)
                        <div class="single-brand-logo">
                            <a href="#"><img src="{{ asset('storage/brand/' . $brand->image ?? 'frontend/img/icon-img/service-9.png') }}" alt=""></a>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div> --}}
@endsection
