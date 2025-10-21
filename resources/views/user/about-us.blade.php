@extends('layouts.user.app')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/project-show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/includes/about.css') }}">
@endsection
@section('wrapper_class')
    single-page-wrap
@endsection
@section('content')
    <!-- Content-->
    <div class="content">
        <div class="single-page-decor"></div>
        <div class="single-page-fixed-row">
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down</span>
            </div>
            <a href="index.html" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to
                    home</span></a>
        </div>
        <!-- section-->
        <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
            <div class="bg par-elem" data-bg="{{ $about->hero_background_url ?? 'images/bg/1.jpg' }}"
                data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="pattern-bg"></div>
            <div class="container">
                <div class="section-title">
                    <h2>{{ $about->hero_title ?? 'About Our Company' }}</h2>
                    <p>{{ $about->hero_description ?? 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.' }}
                    </p>
                    <div class="horizonral-subtitle"><span>{{ $about->hero_subtitle ?? '// About Us' }}</span></div>
                </div>
                <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i
                        class="fal fa-long-arrow-down"></i></a>
            </div>
        </section>
        <!-- section end-->
        <!-- section end-->
        <!-- section -->
        <section data-scrollax-parent="true" id="sec1">
            <div class="section-subtitle left-pos" data-scrollax="properties: { translateY: '-250px' }">
                <span>{{ $about->services_subtitle ?? '//' }}</span>{{ $about->services_title ?? 'Services' }}
            </div>
            <div class="container">
                <!-- serv-carousel-wrap-->
                <div class="serv-carousel-wrap slider-carousel-wrap fl-wrap">
                    <div class="sp-cont  sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                    <div class="sp-cont   sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
                    <!-- serv-carousel -->
                    <div class="serv-carousel fl-wrap cur_carousel-slider-container">
                        @if ($about && $about->services)
                            @foreach ($about->services as $index => $service)
                                <!-- serv-carousel-item -->
                                <div class="serv-carousel-item">
                                    <div class="serv-wrap fl-wrap">
                                        <div class="time-line-icon">
                                            <i class="{{ $service['icon'] ?? 'fal fa-desktop' }}"></i>
                                        </div>
                                        <h4>{{ $service['title'] ?? 'Service Title' }}</h4>
                                        <div class="process-details">
                                            <div class="serv-img">
                                                @php
                                                    $serviceImages = $about->getMedia('service_images');
                                                    $serviceImage = $serviceImages->get($index) ?? null;
                                                    $imageUrl = $serviceImage
                                                        ? $serviceImage->getUrl()
                                                        : 'images/services/1.jpg';
                                                    $imageBigUrl = $serviceImage
                                                        ? $serviceImage->getUrl()
                                                        : 'images/services/1-big.jpg';
                                                @endphp
                                                <img src="{{ $imageUrl }}" alt="">
                                                <a href="{{ $imageBigUrl }}" class="serv-zoom image-popup"><i
                                                        class="fal fa-search"></i></a>
                                            </div>
                                            <h6>{{ $service['title'] ?? 'Service Title' }}</h6>
                                            <p>{{ $service['description'] ?? 'Service description goes here.' }}</p>
                                            @if (isset($service['features']) && is_array($service['features']))
                                                <ul>
                                                    @foreach ($service['features'] as $feature)
                                                        <li>{{ $feature }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <ul>
                                                    <li>Concept</li>
                                                    <li>Design</li>
                                                    <li>Implementation</li>
                                                </ul>
                                            @endif
                                        </div>
                                        <span
                                            class="process-numder">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}.</span>
                                    </div>
                                </div>
                                <!-- serv-carousel-item end -->
                            @endforeach
                        @else
                            <!-- Default services if no data -->
                            <div class="serv-carousel-item">
                                <div class="serv-wrap fl-wrap">
                                    <div class="time-line-icon">
                                        <i class="fal fa-desktop"></i>
                                    </div>
                                    <h4>Web Design</h4>
                                    <div class="process-details">
                                        <div class="serv-img">
                                            <img src="images/services/1.jpg" alt="">
                                            <a href="images/services/1-big.jpg" class="serv-zoom image-popup"><i
                                                    class="fal fa-search"></i></a>
                                        </div>
                                        <h6>Web Design</h6>
                                        <p>Creating stunning, user-friendly websites that captivate your audience.</p>
                                        <ul>
                                            <li>Concept</li>
                                            <li>Design</li>
                                            <li>Development</li>
                                        </ul>
                                    </div>
                                    <span class="process-numder">01.</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- serv-carousel  end-->
                </div>
                <!-- serv-carousel-wrap end-->
            </div>
            <div class="bg-parallax-module" data-position-top="50" data-position-left="20"
                data-scrollax="properties: { translateY: '-250px' }"></div>
            <div class="bg-parallax-module" data-position-top="40" data-position-left="70"
                data-scrollax="properties: { translateY: '150px' }"></div>
            <div class="bg-parallax-module" data-position-top="80" data-position-left="80"
                data-scrollax="properties: { translateY: '350px' }"></div>
            <div class="bg-parallax-module" data-position-top="95" data-position-left="40"
                data-scrollax="properties: { translateY: '-550px' }"></div>
            <div class="sec-lines"></div>
        </section>
        <section class="dark-bg sinsec-dec sinsec-dec2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="video-box fl-wrap about-video-box">
                            @if ($about && $about->getFirstMedia('presentation_video'))
                                <div class="about-video-player">
                                    <video controls preload="metadata"
                                        poster="{{ $about->video_thumbnail_url ?? asset('images/all/2.jpg') }}">
                                        <source src="{{ $about->presentation_video_url }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @else
                                <img src="{{ $about->video_thumbnail_url ?? 'images/all/2.jpg' }}" class="respimg"
                                    alt="Video placeholder">
                                @if ($about && $about->presentation_pdf_url)
                                    <a class="video-box-btn color-bg" href="{{ $about->presentation_pdf_url }}"
                                        target="_blank" aria-label="Open presentation PDF">
                                        <i class="fas fa-file-pdf" aria-hidden="true"></i>
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="video-promo-text fl-wrap mar-top">
                            <h3>{{ $about->video_title ?? 'Our Presentation Video' }}</h3>
                            <p>{{ $about->video_description ?? 'In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida.' }}
                            </p>
                            @if ($about && $about->presentation_pdf_url)
                                <a href="{{ $about->presentation_pdf_url }}" target="_blank"
                                    class="btn float-btn flat-btn color-btn mar-top">{{ $about->video_button_text ?? 'View Our Presentation' }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="half-bg-dec single-half-bg-dec" data-ran="12"></div>
            <div class="sec-lines"></div>
        </section>

        <!-- section end-->
        <!-- section-->
        <section class="dark-bg2 small-padding order-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3>{{ $about->cta_title ?? 'Ready To Order Your Project?' }}</h3>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ $about->cta_button_url ?? 'contacts.html' }}" class="btn flat-btn color-btn">
                            {{ $about->cta_button_text ?? 'Get In Touch' }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
    <!-- Content end -->


@endsection

@section('js')
@endsection
