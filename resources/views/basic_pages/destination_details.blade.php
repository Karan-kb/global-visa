@extends('basic_pages.layouts.master')


@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img pt-100 pb-95"
            style="background-image:url({{ asset('storage/' . ($destination_single->banner_image ?? 'frontend/img/images/details-img-1.jpg')) }});">
            <div class="container">
                <h2>{{ $destination_single->nation->name ?? '' }}</h2>
                <p>{{ $destination_single->sub_title ?? '' }}</p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i>Study in
                            {{ $destination_single->nation->name ?? '' }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @if (!empty($destination_single))
        <div class="about-us pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="about-content">
                            <div class="section-title section-title-green mb-30">
                                <h2>Why Study in <span>{{ $destination_single->nation->name ?? '' }}</span></h2>
                                <p>{{ $destination_single->why_subtitle ?? '' }}</p>
                            </div>
                            <p>{!! $destination_single->description ?? '' !!}</p>
                        </div>
                    </div>
                    @if (!empty($destination_single) && $destination_single->why_image)
                        <div class="col-lg-6 col-md-6">
                            <div class="about-img default-overlay">
                                <img src="{{ asset('storage/' . ($destination_single->why_image ?? 'frontend/img/images/details-img-1.jpg')) }}"
                                    alt="">
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 col-md-6">
                            <div class="about-img default-overlay">
                                <img src="{{ asset('frontend/img/images/details-img-1.jpg') }}" alt="">
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endif

    @if (!empty($destination_single->facts) && count($destination_single->facts) > 0)
        <div class="achievement-area pt-75 pb-80 achievement-area-custom">
            <div class="container">
                <div class="section-title mb-50">
                    <h2>Facts about <span>{{ $destination_single->nation->name ?? '' }}</span></h2>
                    <p>{{ $destination_single->fact_subtitle ?? '' }}</p>
                </div>
                <div class="grid-container-custom mb-80">
                    @foreach ($destination_single->facts as $fact)
                        <div class="grid-item-custom">
                            <span class="icon-custom">
                                <img src="{{ asset('frontend/img/images/tick.svg') }}" alt="Tick">
                            </span>
                            {!! $fact->description !!}
                        </div>
                    @endforeach
                </div>
                <div class="video-area-custom">
                    <h2 class="mb-20">
                        <strong>Education System in {{ $destination_single->nation->name ?? '' }} | Study in
                            {{ $destination_single->nation->name ?? '' }} from Nepal</strong>
                    </h2>
                    <div class="video-area bg-img pt-270 pb-270"
                        style="background-image:url({{ asset('storage/' . ($destination_single->video_image ?? 'frontend/img/images/details-img-1.jpg')) }});">
                        <div class="video-btn-2">
                            <a class="video-popup" href="{{ $destination_single->youtube_link ?? '' }}">
                                <img class="animated" src="{{ asset('frontend/img/images/viddeo-btn.png') }}"
                                    alt="Video play Button">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (!empty($destination_single->reasons) && count($destination_single->reasons) > 0)
        <div class="choose-area bg-img pt-90 pb-50"
            style="background-image:url({{ asset('frontend/img/images/img/bg/bg-8.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="section-title b-0">
                            <h2>Reasons to Study in <span>{{ $destination_single->nation->name ?? '' }}</span></h2>
                            <p>{{ $destination_single->reason_subtitle ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="about-chose-us abt-row-custom pt-50">
                            <div class="row">
                                @if (!empty($destination_single) && $destination_single->reasons)
                                    @foreach ($destination_single->reasons as $reason)
                                        <div class="col-lg-4 col-md-6 abt-col-custom">
                                            <div class="single-about-chose-us mb-50">
                                                <div class="about-choose-img text-center">
                                                    <div class="svg-custom">
                                                        {!! $reason->image !!}
                                                    </div>
                                                </div>
                                                <div class="about-choose-content text-light-blue">
                                                    <h3>{{ $reason->title }}</h3>
                                                    <p>{{ $reason->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if (!empty($destination_single->latestVisa))
        <div class="about-us pt-80 pb-80 visa-custom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="about-content">
                            <div class="section-title section-title-green mb-30">
                                <h2>Visa Process <span>{{ $destination_single->nation->name ?? '' }}</span></h2>

                                <p>{{ $destination_single->latestVisa->sub_title ?? '' }}</p>





                            </div>
                            <p>{!! $destination_single->latestVisa->description ?? '' !!}</p>
                            <div class="custon-h3 mt-50">
                                <h3>For more details click here</h3>
                            </div>
                            <div class="about-btn mt-10">
                                <a class="default-btn" href="{!! $destination_single->latestVisa->link ?? '' !!}" target="_blank">Visa Process</a>
                            </div>
                        </div>
                    </div>
                    @if (!empty($destination_single->latestVisa) && $destination_single->latestVisa->image)
                        <div class="col-lg-6 col-md-6">
                            <div class="about-img default-overlay">
                                <img src="{{ asset('storage/' . $destination_single->latestVisa->image) }}" alt="">
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 col-md-6">
                            <div class="about-img default-overlay">
                                <img src="{{ asset('frontend/img/images/details-img-1.jpg') }}" alt="">
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endif

    @if (!empty($destination_single->latestCost))
        <div class="about-us pt-80 pb-80 j-custom">
            <div class="container">
                <div class="row mb-50">
                    <div class="col-lg-9 col-md-6">
                        <div class="about-content">
                            <div class="section-title mb-30">
                                <h2>Cost to Study in <span>{{ $destination_single->nation->name ?? '' }}</span></h2>
                                <p>Below is a table providing an approximate range of annual tuition fees for international
                                    students studying in {{ $destination_single->nation->name ?? '' }}:</p>
                            </div>
                            {{-- @dd($destination_single->latestCost->value) --}}

                            @if (!empty($destination_single->latestCost) && $destination_single->latestCost->value)
                                <div class="custom-table bootstrap-table responsive-table table-responsive">
                                    {!! $destination_single->latestCost->value ?? '' !!} &nbsp;&nbsp;
                                </div> 
                            @endif


                            &nbsp;&nbsp;

                            <p class="ms-0">
                                *Note: The cost mentioned above is based on estimated figures from the college and
                                university
                                average and does not confirm the fees you may pay.
                            </p>

                        </div>
                    </div>
                    @if (!empty($destination_single->latestCost) && $destination_single->latestCost->image)
                        <div class="col-lg-3 col-md-6">
                            <div class="about-img default-overlay">
                                <img src="{{ asset('storage/' . $destination_single->latestCost->image) }}" alt="Cost">
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 col-md-6">
                            <div class="about-img default-overlay">
                                <img src="{{ asset('frontend/img/images/details-img-1.jpg') }}" alt="">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="about-content">
                    <div class="section-title mb-30">
                        <h2>Top Universities in <span>{{ $destination_single->nation->name ?? '' }}</span></h2>
                        <p>Below is a table providing top universities in {{ $destination_single->nation->name ?? '' }},
                            where
                            excellence meets opportunity!</p>
                    </div>
                    <div class="custom-table responsive-table table-responsive">
                        <table class="table table-bordered border-default">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 40px;">S.N</th>
                                    <th scope="col">University</th>
                                    <th scope="col">World University Rank </th>
                                    {{-- <th scope="col">Australia Rank 2024</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($destination_single->univs))
                                    @foreach ($destination_single->univs as $univ)
                                        @foreach ($univ->universities() as $university)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $university->name ?? '' }}</strong></td>
                                                <td>{{ $university->ranking ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">No universities found.</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (!empty($destination_single->best_cities))
        <div class="achievement-area pt-75 pb-20 achievement-area-custom">
            <div class="container">
                <div class="section-title mb-50">
                    <h2>Best Cities to Study in <span>{{ $destination_single->nation->name ?? '' }}</span></h2>
                    <p>{{ $destination_single->city_subtitle ?? '' }}</p>
                </div>
                <div class="grid-container-custom mb-80">
                    @if (!empty($destination_single->best_cities))
                        @foreach (json_decode($destination_single->best_cities) as $city)
                            <div class="grid-item-custom">
                                <span class="icon-custom">
                                    <img src="{{ asset('frontend/img/images/tick.svg') }}" alt="Tick">
                                </span>
                                <h3 class="m-0">{{ $city }}</h3>
                            </div>
                        @endforeach
                    @else
                        <p>No best cities found.</p>
                    @endif

                </div>
            </div>
        </div>
    @endif

    @if (!empty($destination_single->majors) && count($destination_single->majors) > 0)
        <div class="about-us pt-50 two-col-custom">
            <div class="container">
                <div class="row mb-50">
                    <div class="col-md-6">
                        <div class="about-content">
                            <h3 class="popularandcost">Popular Courses
                                <span>{{ $destination_single->nation->name ?? '' }}</span>
                            </h3>
                            <div class="custom-table responsive-table table-responsive">
                                <table class="table table-bordered border-default">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 40px;">S.N</th>
                                            <th scope="col">Course</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($destination_single->majors))
                                            @foreach ($destination_single->majors as $major)
                                                @foreach ($major->courses() as $course)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            <b>{{ $course->name ?? '' }}</b>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">No courses found.</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-content">
                            <h3 class="popularandcost">Cost of Living in
                                <span>{{ $destination_single->nation->name ?? '' }}</span>
                            </h3>
                            @if (!empty($destination_single->latestLivingCost) && $destination_single->latestLivingCost->value)
                                <div class="custom-table bootstrap-table responsive-table table-responsive">
                                    {!! $destination_single->latestLivingCost->value ?? '' !!}
                                </div> 
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (!empty($destination_single->healths) && count($destination_single->healths) > 0)
        <div class="choose-area bg-img pt-90 pb-50"
            style="background-image:url({{ asset('frontend/img/images/bg-1-custom.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="section-title b-0">
                            <h2>Health Insurance in <span>{{ $destination_single->nation->name ?? '' }}</span></h2>
                            <p>{{ $destination_single->health_subtitle ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="about-chose-us abt-row-custom pt-50">
                            <div class="row">
                                @if (!empty($destination_single->healths))
                                    @foreach ($destination_single->healths as $health)
                                        <div class="col-md-6 abt-col-custom">
                                            <div class="single-about-chose-us mb-50">
                                                <div class="about-choose-img text-center">
                                                    <div class="svg-custom">
                                                        {!! $health->image !!}

                                                    </div>
                                                </div>
                                                <div class="about-choose-content text-light-blue">
                                                    <h3>{{ $health->title }}</h3>
                                                    <p>{{ $health->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            {{-- <div class="note-box-custom">
                            <p>It is important to carefully understand the terms and conditions of the OSHC policy and seek
                                clarification from the insurance provider regarding any queries or concerns. It’s
                                recommended to explore different insurance options and choose a plan that provides adequate
                                coverage and meets your specific requirements.</p>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (!empty($destination_single->latestScholarship))
        <div class="about-us pt-80 pb-80 visa-custom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="about-content">
                            <div class="section-title section-title-green mb-30">
                                <h2>Scholarships in <span>{{ $destination_single->nation->name ?? '' }}</span></h2>
                                <p>{{ $destination_single->latestScholarship->sub_title ?? '' }}</p>
                            </div>
                            <p>{!! $destination_single->latestScholarship->description ?? '' !!}</p>
                            <div class="custon-h3 mt-50">
                                <h3>For more details click here</h3>
                            </div>
                            <div class="about-btn mt-10">
                                <a class="default-btn" href="{{ $destination_single->latestScholarship->link ?? '' }}"
                                    target="_blank">Scholarships</a>
                            </div>
                        </div>
                    </div>
                    @if (!empty($destination_single->latestScholarship) && $destination_single->latestScholarship->image)
                        <div class="col-lg-6 col-md-6">
                            <div class="about-img default-overlay">
                                <img src="{{ asset('storage/' . $destination_single->latestScholarship->image) }}"
                                    alt="">
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 col-md-6">
                            <div class="about-img default-overlay">
                                <img src="{{ asset('frontend/img/images/details-img-1.jpg') }}" alt="">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if (!empty($destination_single->jobs) && count($destination_single->jobs) > 0)
        <div class="choose-area bg-img pt-90 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="section-title b-0">
                            <h2>Job Opportunities in <span>{{ $destination_single->nation->name ?? '' }}</span></h2>
                            <p>{{ $destination_single->job_subtitle ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="about-chose-us abt-row-custom pt-50">
                            <div class="row">
                                @if (!empty($destination_single->jobs))
                                    @foreach ($destination_single->jobs as $job)
                                        <div class="col-md-6 abt-col-custom">
                                            <div class="single-about-chose-us mb-50">
                                                <div class="about-choose-content text-light-blue">
                                                    <h3>{{ $job->title ?? '' }}:</h3>
                                                    <p>{!! $job->description ?? '' !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (!empty($destination_single->faqs) && count($destination_single->faqs) > 0)
        <div class="faq-section pt-90 pb-90">
            <div class="container">
                <div class="row mb-30">
                    <div class="col-md-9">
                        <div class="section-title b-0">
                            <h2>{{ $page->pageContents[0]->title ?? '' }}</span></h2>
                            <p>{{ $page->pageContents[0]->subtitle ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-custom" id="accordionExample">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            @if (!empty($destination_single) && $destination_single->faqs)
                                @foreach ($destination_single->faqs as $index => $faq)
                                    @if ($index % 2 == 0)
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $index }}">
                                                <h5 class="mb-0">
                                                    <button class="accordion-button btn btn-link collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $index }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $index }}">
                                                        {{ $faq->title }}
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse{{ $index }}" class="collapse"
                                                aria-labelledby="heading{{ $index }}"
                                                data-bs-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>{{ $faq->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            @if (!empty($destination_single) && $destination_single->faqs)
                                @foreach ($destination_single->faqs as $index => $faq)
                                    @if ($index % 2 != 0)
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $index }}">
                                                <h5 class="mb-0">
                                                    <button class="accordion-button btn btn-link collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $index }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $index }}">
                                                        {{ $faq->title }}
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse{{ $index }}" class="collapse"
                                                aria-labelledby="heading{{ $index }}"
                                                data-bs-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>{{ $faq->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="about-us pt-80 pb-80 footer-form-custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about-content">
                        <div class="section-title section-title-green mb-30">
                            <h2>{{ $page->pageContents[1]->title ?? '' }}</h2>
                            <p>{{ $page->pageContents[1]->subtitle ?? '' }}</p>
                        </div>
                    </div>
                    <form action="{{ route('destination-contact') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="billing-info-wrap">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Full Name</label>
                                        <input type="text" name="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Email Id</label>
                                        <input type="text" name="email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Mobile No.</label>
                                        <input type="text" name="phone">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-select mb-20">
                                        <label>Prefered Study Destination</label>
                                        <select class="" name="destination_id">
                                            <option>Select a Country</option>
                                            @foreach ($inquiry_destination as $destination)
                                                <option value="{{ $destination->id }}">
                                                    {{ $destination->nation->name ?? '' }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Subject</label>
                                        <input type="text" name="subject">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Message</label>
                                        <textarea name="message"></textarea>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 col-md-6">
                                <div class="billing-select mb-20">
                                    <label>Nearest Office</label>
                                    <select>
                                        <option>Select a Office</option>
                                        <option>Kathmandu</option>
                                        <option>Lalitpur</option>
                                        <option>Bhaktapur</option>
                                        <option>Butwal</option>
                                        <option>Biratnagar</option>
                                    </select>
                                </div>
                            </div> --}}

                                {{-- <div class="col-md-12">
                                <div class="checkout-account mb-50">
                                    <input class="checkout-toggle2 me-2" type="checkbox" id="check-yes-custom">
                                    <label for="check-yes-custom">Yes, I would like to receive information on study abroad
                                        news and events</label>
                                </div>
                            </div> --}}
                                <div class="col-lg-12">
                                    <button class="default-btn w-100" type="submit" value="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if ($page->pagecontents[1]->image)
                    <div class="col-lg-6 col-md-6">
                        <div class="about-img default-overlay">
                            <img src="{{ asset('storage/page/' . $page->pagecontents[1]->image) }}" alt="">
                        </div>
                    </div>
                @else
                    <div class="col-lg-6 col-md-6">
                        <div class="about-img default-overlay">
                            <img src="{{ asset('frontend/img/images/getintouch.jpg') }}" alt="">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
