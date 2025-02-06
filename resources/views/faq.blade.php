@extends('layouts.frontend')
@section('title')
    Faqs
@endsection

@section('content')
    <section class="agency breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="breadcrumb-text text-center">Discovery</h2>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="#">FAQ's</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- section start -->
    <section class="agency blog-sec blog-sidebar single_blog_item faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-text">
                        <div class="blog-description">
                            <!--Accordion wrapper-->
                            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                                <?php $i = 1; ?>
                                @foreach ($faq as $faq)
                                    <!-- Accordion card -->
                                    <div class="card">
                                        <!-- Card header -->
                                        <a data-toggle="collapse" data-parent="#accordionEx"
                                            href="#collapseOne<?php echo $i; ?>" aria-expanded="true"
                                            aria-controls="collapseOne<?php echo $i; ?>">
                                            <div class="card-header" role="tab" id="headingOne<?php echo $i; ?>">
                                                <h5 class="mb-0">{{ $loop->iteration }}.&nbsp;{!! $faq->question !!} <i
                                                        class="fas fa-angle-down rotate-icon faq-icon"></i>
                                                </h5>
                                            </div>
                                        </a>
                                        <!-- Card body -->
                                        <div id="collapseOne<?php echo $i; ?>"
                                            class="collapse @if ($loop->first) show @endif" role="tabpanel"
                                            aria-labelledby="headingOne<?php echo $i; ?>" data-parent="#accordionEx">
                                            <div class="card-body">{!! $faq->answer !!}</div>
                                        </div>
                                    </div>
                                    <!-- Accordion card -->
                                    <?php $i++; ?>
                                @endforeach

                            </div>
                            <!-- Accordion wrapper -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- section end -->
@endsection
