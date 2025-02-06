@extends('basic_pages.layouts.master')

@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-5 pt-100 pb-95"
            style="background-image:url({{ asset('storage/services/' . $s->image ?? 'frontend/img/icon-img/service-9.png') }});">
            <div class="container">
                <h2>{{ $s->title ?? '' }}</h2>
                <p>{!! $s->body ?? '' !!}</p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i>{{ $s->title ?? '' }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Service Details Section -->
    <div class="service-details-area pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-details-content">
                        <h3>{{ $s->title }}</h3>
                        <p>{!! $s->body !!}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <div class="single-sidebar-widget mb-30">
                            <h4>FAQ</h4>
                            <div class="faq-accordion">
                                <?php $i = 1; ?>
                                @foreach ($q as $faq)
                                    <div class="card">
                                        <div class="card-header" id="heading{{ $i }}">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapse{{ $i }}" aria-expanded="true"
                                                    aria-controls="collapse{{ $i }}">
                                                    {{ $faq->question }}
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse{{ $i }}" class="collapse"
                                            aria-labelledby="heading{{ $i }}" data-parent="#faqAccordion">
                                            <div class="card-body">
                                                {!! $faq->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Info Section -->
    <div class="contact-info-area bg-img pt-180 pb-140 default-overlay"
        style="background-image:url({{ asset('frontend/img/bg/contact-info.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-contact-info mb-30 text-center">
                        <div class="contact-info-icon">
                            <span><i class="fa fa-map-marker"></i></span>
                        </div>
                        <p>Uttara, Dhaka, Bangladesh <br>Opposite site Of Yellow.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-contact-info mb-30 text-center">
                        <div class="contact-info-icon">
                            <span><i class="fa fa-phone"></i></span>
                        </div>
                        <div class="contact-info-phn">
                            <div class="info-phn-title">
                                <span>Phone : </span>
                            </div>
                            <div class="info-phn-number">
                                <p>+091111111111</p>
                                <p>+091111111111</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="single-contact-info mb-30 text-center">
                        <div class="contact-info-icon">
                            <span><i class="fa fa-envelope"></i></span>
                        </div>
                        <a href="#">education@email.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brand Logo Section -->
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
    </div>
@endsection
