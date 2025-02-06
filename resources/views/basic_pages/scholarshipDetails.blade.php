@extends('basic_pages.layouts.master')
@section('title')
    Scholarship Details
@endsection

@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-5 pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h2>{{ $page->pagecontents[0]->title ?? '' }}</h2>
                <p>{!! $page->pagecontents[0]->content ?? 'Learn more about this scholarship and apply now.' !!}</p>
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

    <!-- Scholarship Introduction Section -->
    <div class="container pt-130 pb-130">
      <div class="row justify-content-center"> <!-- Centering the content using 'justify-content-center' -->
          <div class="col-12 col-md-10 col-lg-8">
              <!-- Adjusting for full-width on smaller screens and centered on larger screens -->
              
              <!-- Image above the title -->
              @if ($scholarship->image)
                  <div class="scholarship-image mb-4">
                      <img src="{{ asset('storage/scholarship/' . $scholarship->image) }}" alt="{{ $scholarship->title }}" class="img-fluid" style="height: 300px; width: 900px;">
                  </div>
              @endif
  
              <h2 class="scholarship-heading">{{ $scholarship->title }}</h2>
  
              <div class="scholarship-description">
                  {!! $scholarship->description !!}
              </div>
          </div>
      </div>
  </div>
  
@endsection




@push('js')
@endpush
