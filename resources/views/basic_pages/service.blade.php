@extends('basic_pages.layouts.master')
@section('title')
    Services
@endsection

@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-5 pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h2>{{ $page->pagecontents[0]->title ?? 'Services' }}</h2>
                <p>{!! $page->pagecontents[0]->content ?? 'Available Services Here.' !!}</p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i>Services</span></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Service Detail Area -->
    <div class="service-detail-area pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Service Image and Content -->
                <div class="col-lg-10">
                    <div class="service-image mb-4 text-center">
                        @if ($s && $s->image)
                            <img src="{{ asset('storage/services/' . $s->image) }}" alt="{{ $s->title }}"
                                class="img-fluid rounded shadow" style="max-height: 400px; width: auto; object-fit: cover;">
                        @else
                            <p>No image available.</p> <!-- Optional: Display a fallback message or image -->
                        @endif
                    </div>

                    <div class="text-center">
                        <h2 class="service-heading mb-3" style="font-size: 2.5rem; font-weight: 600;">
                            {{ $s->title }}
                        </h2>
                        <h6 class="text-muted mb-4" style="font-size: 1rem;">
                            {{ \Carbon\Carbon::parse($s->created_at)->format('j F, Y') }}
                        </h6>
                    </div>

                    <div class="service-description text-center" style="line-height: 1.8; font-size: 1.125rem;">
                        {!! $s->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.toggle-icon').forEach(icon => {
                icon.addEventListener('click', () => {
                    const target = icon.getAttribute('data-bs-target');
                    const collapseElement = document.querySelector(target);
                    const isCollapsed = collapseElement.classList.contains('show');

                    // Toggle the icon between + and -
                    if (isCollapsed) {
                        icon.textContent = '+';
                    } else {
                        icon.textContent = '-';
                    }

                    console.log('FAQ toggled!');
                });
            });
        });
    </script> --}}
@endpush
