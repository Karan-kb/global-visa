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
    



    <div class="about-us pt-130 pb-130">
        <div class="container">
            <div class="row">
            <div class="col-lg-7 col-md-12">
                    <div class="about-img about-img-2 custom-overlay mr-70">
                        <img src="{{asset('frontend/img/banner/banner-2.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="about-content-2 pr-70">
                        <div class="section-title section-title-green mb-30">
                            <h2>Business Profile</h2>
                            <p>Introduction of Global Visa Advisor</p>
                        </div>
                        <p><strong>Global Visa Advisor Education Consultancy</strong> (GVA) Private Limited established as an Education Consultant in January 2007. We recently celebrated 18 glorious years of experience in the field of quality consulting and guidance in 2025.</p>
                        <p><strong>Currently</strong>, we represent a substantial number of Universities and Colleges around the world providing a large range of quality education to aspiring students.</p>
                        <p><strong>Our mission</strong> is to sculpt the perfect and stable education packages for students willing to study abroad and Nepal. We craft an enriched career through expert advising and counseling. We are committed to maintaining a high standard in supporting our prospective students and adhering to it to become a dynamic guidance provider.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area pt-70 pb-70">
        <div class="container">
            <div class="section-title section-title-green mb-75">
                <h2>Facilities and Services</h2>
                <p>We provide various facilities and services to our students other than counseling.  Some of our distinct features include but are not limited to </p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="recom-box">
                        <h5>1. Learning Facility:</h5>
                        <ul class="d-flex flex-wrap">
                            <li>
                                <a href="" class="d-flex flex-column text-center">
                                    <img src="{{asset('frontend/img/banner/fac-1.jpg')}}" alt="image description">
                                    <!-- <h6>TOEFL</h6> -->
                                </a>
                            </li>
                            <li>
                                <a href="" class="d-flex flex-column text-center">
                                    <img src="{{asset('frontend/img/banner/fac-2.jpg')}}" alt="image description">
                                    <!-- <h6>IELTS</h6> -->
                                </a>
                            </li>
                            <li>
                                <a href="" class="d-flex flex-column text-center">
                                    <img src="{{asset('frontend/img/banner/fac-3.jpg')}}" alt="image description">
                                    <!-- <h6>PTE</h6> -->
                                </a>
                            </li>
                            <li>
                                <a href="" class="d-flex flex-column text-center">
                                    <img src="{{asset('frontend/img/banner/fac-4.jpg')}}" alt="image description">
                                    <!-- <h6>SAT</h6> -->
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="recom-box">
                    <h5>2. Assistance with University selection and admission</h5>
                </div>
                <div class="recom-box">
                    <h5>3. Documentation</h5>
                </div>
                <div class="recom-box">
                    <h5>4. Visa procedure and</h5>
                </div>
                <div class="recom-box">
                    <h5>5. Retrieving education loans</h5>
                </div>
            </div>
            <div class="about-content-2 pr-70">
                <p>We deal with students individually for test preparation, mock interviews, counseling and support.</p>
                <p>Additionally, we pledge to support our students after they reach their destined universities and countries to prevent our students from facing challenges and confusions. We assist with the <strong>Pre-departur</strong>, <strong>Post-departure guidelines</strong>, <strong>Airport pickup </strong> and <strong>Selection of accommodation </strong>.</p>
                <p>We are  dedicated to create a smooth transition from Nepal to a new country ensuring a sustainable new life of the students.</p>
                <p><strong>Our mission</strong> is to sculpt the perfect and stable education packages for students willing to study abroad and Nepal. We craft an enriched career through expert advising and counseling. We are committed to maintaining a high standard in supporting our prospective students and adhering to it to become a dynamic guidance provider.</p>
                <p>We, <strong>GVAEC</strong>, is situated Kathmandu at Putalisadak Chow (way to Dillibazar). Our office is easily accessible to students, with smooth transport links, reliable internet, and ample parking space to ensure convenience</p>
                <p>We are renowned for delivering quality over quantity. We ensure transparency, integrity, and ethical practices in all our operations. Our team consistently enhances their expertise in international education policies and requirements, enabling us to guide students effectively in choosing the right pathway for their future.</p>
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
