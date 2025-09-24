@extends('layouts.user.app')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/project-show.css') }}">
@endsection
@section('wrapper_class')
    single-page-wrap
@endsection
@section('content')
    <div class="single-page-decor"></div>
    <div class="single-page-fixed-row">
        <div class="scroll-down-wrap">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
            <span>Scroll Down</span>
        </div>
        <a href="{{ route('home') }}" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to
                home</span></a>
    </div>

    <div class="content">
        <div class="single-page-decor"></div>
        <div class="single-page-fixed-row">
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down</span>
            </div>
            <a href="{{ route('home') }}" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to
                    home</span></a>
        </div>
        <!-- section  -->
        <section class="no-padding dark-bg sinsec-dec">
            <div class="single-project-title fl-wrap">
                <h2><span class="caption">{{ $project->title }}</span></h2>
            </div>
            <!-- show-case-slider-wrap-->
            <div class="show-case-slider-wrap slider-carousel-wrap">
                <div class="sp-cont sarr-contr sp-cont-prev"><i class="fal fa-arrow-left"></i></div>
                <div class="sp-cont sarr-contr sp-cont-next"><i class="fal fa-arrow-right"></i></div>
                <div class="show-case-slider cur_carousel-slider-container lightgallery fl-wrap full-height"
                    data-slick='{"centerMode": false}'>
                    <!-- Video section with Vimeo embed -->
                    @if (!empty($videoUrl) || !empty($videoPosterUrl))
                        {{-- <div class="show-case-item" data-curtext="{{ $project->title }}">
                            <div class="show-case-wrapper fl-wrap full-height"
                                style="height:70vh;width:940px;max-width:90vw;display:flex;align-items:center;justify-content:center;">
                                <div class="video-box fl-wrap">
                                    <img src="{{ $videoPosterUrl ?: asset('images/all/2.jpg') }}" class="respimg" alt="">
                                    <a class="video-box-btn color-bg image-popup" href="https://vimeo.com/110234211"><i class="fal fa-play" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div> --}}


                        <div class="show-case-item" data-curtext="{{ $project->title }}">
                            <div class="show-case-wrapper fl-wrap full-height">
                                <div class="video-box full-height">
                                    <img src="{{ $videoPosterUrl ?: asset('images/all/2.jpg') }}" class="respimg"
                                        alt="">
                                    <a class="video-box-btn color-bg video-popup" href="{{ $videoUrl }}"><i
                                            class="fal fa-play" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Gallery items -->
                    @forelse ($galleryImages as $image)
                        <div class="show-case-item" data-curtext="{{ $project->title }}">
                            <div class="show-case-wrapper fl-wrap full-height">
                                <img src="{{ $image->getUrl() }}" alt="{{ $project->title }}">
                                <a href="{{ $image->getUrl() }}" class="fet_pr-carousel-box-media-zoom popup-image"><i
                                        class="fal fa-search"></i></a>
                                <div class="show-info">
                                    <span>Info</span>
                                    <div class="tooltip-info">
                                        <h5>{{ $project->title }}</h5>
                                        <p>{{ Str::limit($project->description, 120) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- No images fallback -->
                    @endforelse
                </div>
                <div class="fet_pr-carousel-counter show-case-slider-counter"></div>
            </div>
            <!-- show-case-slider-wrap end-->
            <div class="half-bg-dec single-half-bg-dec" data-ran="12"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section data-scrollax-parent="true">
            <div class="section-subtitle right-pos" data-scrollax="properties: { translateY: '-250px' }">
                <span>//</span>Project Title
            </div>
            <div class="container">
                <!-- det box-->
                <div class="fl-wrap">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="fixed-column l-wrap">
                                <div class="pr-title fl-wrap">
                                    <h3>Project Details</h3>
                                    <span>{{ Str::limit($project->description, 140) }}</span>
                                </div>

                                <div class="pr-title fl-wrap">
                                    <div class="project-action-buttons">
                                        @if (isset($brochureAvailable) && $brochureAvailable)
                                            <a class="btn flat-btn color-btn"
                                                href="{{ route('projects.brochure.preview', $project) }}"
                                                target="_blank">Preview Manual</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="ci-num"><span>{{ str_pad($project->id, 2, '0', STR_PAD_LEFT) }}.</span></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="details-wrap fl-wrap">
                                <h3>{{ $project->title }}</h3>
                                <div class="clearfix"></div>
                                <p>{{ $project->description }}</p>
                            </div>

                            <!-- Features -->
                            <div class="pr-list fl-wrap">
                                <div class="smart-features">
                                    <div class="features-header">
                                        <h2 class="features-title">Smart Features</h2>
                                        <p class="features-subtitle">Discover what makes our platform exceptional</p>
                                    </div>

                                    <div class="feature-content active">
                                        <div class="feature-grid">
                                            @forelse ($project->features as $feature)
                                                <div class="feature-card">
                                                    <div class="feature-icon">
                                                        @if (!empty($feature->icon))
                                                            <i class="fa-fw {{ $feature->icon }}"></i>
                                                        @else
                                                            ✨
                                                        @endif
                                                    </div>
                                                    <div class="feature-name">{{ $feature->title }}</div>
                                                    <div class="feature-description">{{ $feature->description }}</div>
                                                </div>
                                            @empty
                                                <div class="feature-card">
                                                    <div class="feature-icon">🚀</div>
                                                    <div class="feature-name">Custom Development</div>
                                                    <div class="feature-description">Tailored solution built specifically
                                                        for your business needs</div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing Plans -->
                            @if ($project->hasPricingPlans() && $project->pricingPlans->count() > 0)
                                <div class="pr-list fl-wrap">
                                    <div class="pricing-grid">
                                        @foreach ($project->pricingPlans as $plan)
                                            <div class="pricing-card {{ $plan->is_popular ? 'popular' : '' }}">
                                                <div class="pricing-header">
                                                    <div class="pricing-title">{{ $plan->title }}</div>
                                                    <div class="pricing-subtitle">{{ $plan->subtitle }}</div>
                                                </div>
                                                <div class="price-display">
                                                    @if ($plan->hasFixedPrice() && $plan->hasPerUserPrice())
                                                        <!-- Both prices -->
                                                        <div class="dual-price">
                                                            <div class="price-line">
                                                                @if ($plan->getCurrencyIcon())
                                                                    <img src="{{ $plan->getCurrencyIcon() }}" alt="currency" class="currency-icon">
                                                                @else
                                                                    <span class="currency-symbol">$</span>
                                                                @endif
                                                                <span class="price-amount">{{ number_format($plan->price, 0) }}</span>
                                                            </div>
                                                            <div class="price-period">{{ $plan->per_user_price }}</div>
                                                        </div>
                                                    @elseif ($plan->hasPerUserPrice())
                                                        <!-- Per user price -->
                                                        <div class="price-line">
                                                            @if ($plan->getCurrencyIcon())
                                                                <img src="{{ $plan->getCurrencyIcon() }}" alt="currency" class="currency-icon">
                                                            @endif
                                                            <span class="price-amount">{{ $plan->per_user_price }}</span>
                                                        </div>
                                                    @else
                                                        <!-- Fixed price -->
                                                        <div class="price-line">
                                                            @if ($plan->getCurrencyIcon())
                                                                <img src="{{ $plan->getCurrencyIcon() }}" alt="currency" class="currency-icon">
                                                            @else
                                                                <span class="currency-symbol">$</span>
                                                            @endif
                                                            <span class="price-amount">{{ number_format($plan->price, 0) }}</span>
                                                        </div>
                                                        <div class="price-period">one-time payment</div>
                                                    @endif
                                                </div>
                                                @if ($plan->features && count($plan->features) > 0)
                                                    <ul class="pricing-features">
                                                        @foreach ($plan->features as $f)
                                                            <li>{{ $f }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                <a href="{{ route('contact') }}?subject={{ urlencode('Order Project - ' . $plan->title) }}&project={{ urlencode($project->title) }}&package={{ urlencode($plan->title) }}"
                                                    class="btn flat-btn color-btn">
                                                    {{ $plan->title }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!-- det box end-->
                <div class="content-nav mar-top">
                    <ul>
                        <li><a href="#" class="ln"><i class="fal fa-arrow-left"></i><span
                                    class="tooltip">Prev</span></a></li>
                        <li>
                            <a href="{{ route('project') }}" class="cur-page"><span>All Projects</span></a>
                        </li>
                        <li><a href="#" class="rn"><i class="fal fa-arrow-right"></i><span
                                    class="tooltip">Next</span></a></li>
                    </ul>
                </div>
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
        <!-- section end-->
        <!-- section-->
        <section class="dark-bg2 small-padding order-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Ready To order Your Project ?</h3>
                    </div>
                    <div class="col-md-4"><a
                            href="{{ route('contact') }}?subject={{ urlencode('Order Project - ' . $project->title) }}&project={{ urlencode($project->title) }}"
                            class="btn flat-btn color-btn">Get In
                            Touch</a> </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
@endsection

@section('js')
@endsection
