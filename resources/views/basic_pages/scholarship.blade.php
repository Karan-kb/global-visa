@extends('basic_pages.layouts.master')

@section('content')
    <!-- Breadcrumb Section -->
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
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i>Scholarships</span></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Scholarship List Area -->
    <!-- Scholarship List Area -->
    <div class="scholarship-list-area pt-130 pb-130">
        <div class="container">
            @if ($scholarships && $scholarships->count())
                <div class="row">
                    @foreach ($scholarships as $scholarship)
                        <div class="col-md-4 mb-4"> <!-- Updated to col-md-4 to show 3 per row -->
                            <div class="scholarship-form border p-4 rounded shadow">
                                <div class="scholarship-title mb-3">
                                    @if ($scholarship->image)
                                        <div class="scholarship-image text-center mb-3">
                                            <img src="{{ asset('storage/scholarship/' . $scholarship->image) }}"
                                                alt="{{ $scholarship->title }}" class="img-fluid rounded"
                                                style="height: 202px; width: 270px;">
                                        </div>
                                    @endif
                                    <h2 class="text-center">{{ $scholarship->title ?? 'Scholarship' }}</h2>
                                    <p class="text-justify">{!! Str::limit($scholarship->short_description ?? 'Fill out the form to apply for the scholarship.', 178, '.') !!}</p>
                                    <div class="text-center">
                                        <a href="{{ route('scholarship-details', $scholarship->slug) }}"
                                            class="btn btn-primary read-more-btn">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">No scholarships available at the moment. Please check back later.</p>
            @endif
        </div>
    </div>




   
@endsection

<!-- jQuery and Bootstrap Modal Script -->
@push('js')


    <script>
        // jQuery for toggling "Read More" functionality (Optional if using modal)
        $(document).ready(function() {
            $('.read-more-btn').click(function() {
                var scholarshipId = $(this).data('target');
                var fullDescription = $(scholarshipId).find('.modal-body');
                fullDescription.toggle();
            });
        });
    </script>
