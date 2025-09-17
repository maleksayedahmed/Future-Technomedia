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
        <a href="index.html" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to
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
            <a href="index.html" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to
                    home</span></a>
        </div>
        <!-- section  -->
        <section class="no-padding dark-bg sinsec-dec">
            <div class="single-project-title fl-wrap">
                <h2><span class="caption">Locomotive Project</span></h2>
            </div>
            <!-- show-case-slider-wrap-->
            <div class="show-case-slider-wrap slider-carousel-wrap">
                <div class="sp-cont sarr-contr sp-cont-prev"><i class="fal fa-arrow-left"></i></div>
                <div class="sp-cont sarr-contr sp-cont-next"><i class="fal fa-arrow-right"></i></div>
                <div class="show-case-slider cur_carousel-slider-container lightgallery fl-wrap full-height"
                    data-slick='{"centerMode": false}'>
                    <!-- show-case-item -->
                    <div class="show-case-item" data-curtext="Lokomotive Project">
                        <div class="show-case-wrapper fl-wrap full-height">
                            <img src="images/folio/1.jpg" alt="">
                            <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   popup-image"><i
                                    class="fal fa-search"></i></a>
                            <div class="show-info">
                                <span>Info</span>
                                <div class="tooltip-info">
                                    <h5>Nulla blandit</h5>
                                    <p>Sed non nisi viverra, porttitor sem nec, vestibulum justo tortor ornare turpis
                                        faucibus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- show-case-item end-->
                    <!-- show-case-item -->
                    <div class="show-case-item" data-curtext="Photo Details">
                        <div class="show-case-wrapper fl-wrap full-height">
                            <img src="images/folio/1.jpg" alt="">
                            <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   popup-image"><i
                                    class="fal fa-search"></i></a>
                            <div class="show-info">
                                <span>Info</span>
                                <div class="tooltip-info">
                                    <h5>Nulla blandit</h5>
                                    <p>Sed non nisi viverra, porttitor sem nec, vestibulum justo tortor ornare turpis
                                        faucibus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- show-case-item end-->
                    <!-- show-case-item -->
                    <div class="show-case-item" data-curtext="Awesome Photo">
                        <div class="show-case-wrapper fl-wrap full-height">
                            <img src="images/folio/1.jpg" alt="">
                            <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   popup-image"><i
                                    class="fal fa-search"></i></a>
                            <div class="show-info">
                                <span>Info</span>
                                <div class="tooltip-info">
                                    <h5>Nulla blandit</h5>
                                    <p>Sed non nisi viverra, porttitor sem nec, vestibulum justo tortor ornare turpis
                                        faucibus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- show-case-item end-->
                    <!-- show-case-item -->
                    <div class="show-case-item" data-curtext="Some Details">
                        <div class="show-case-wrapper fl-wrap full-height">
                            <img src="images/folio/1.jpg" alt="">
                            <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   popup-image"><i
                                    class="fal fa-search"></i></a>
                            <div class="show-info">
                                <span>Info</span>
                                <div class="tooltip-info">
                                    <h5>Nulla blandit</h5>
                                    <p>Sed non nisi viverra, porttitor sem nec, vestibulum justo tortor ornare turpis
                                        faucibus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- show-case-item end-->
                    <!-- show-case-item -->
                    <div class="show-case-item" data-curtext="Some Details">
                        <div class="show-case-wrapper fl-wrap full-height">
                            <img src="images/folio/1.jpg" alt="">
                            <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   popup-image"><i
                                    class="fal fa-search"></i></a>
                            <div class="show-info">
                                <span>Info</span>
                                <div class="tooltip-info">
                                    <h5>Nulla blandit</h5>
                                    <p>Sed non nisi viverra, porttitor sem nec, vestibulum justo tortor ornare turpis
                                        faucibus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- show-case-item end-->
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
                                    <span>Lorem Ipsum generators on the Internet king this the first true generator</span>
                                
                                </div>


                                <div class="pr-title fl-wrap">
                                    <div class="project-action-buttons">

                                        @if (isset($brochureAvailable) && $brochureAvailable)
                                            <a class="action-btn-primary" href="{{ route('projects.brochure.preview', $project) }}"
                                                target="_blank">
                                                📄 Product Manual
                                            </a>
                                        @endif
                                        <a class="action-btn-primary" href="#"
                                        target="_blank">
                                        📄 Product Manual
                                    </a>
                
                                        <a href="#" class="action-btn-secondary" onclick="requestDemo()">
                                            🎯 Offer Request
                                        </a>
                                    </div>
                                </div>
                                
                                
                                <div class="ci-num"><span>01.</span></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="details-wrap fl-wrap">
                                <h3>Project Single <span>Title</span></h3>
                                
                                <div class="clearfix"></div>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar</h4>
                                <p>
                                    Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis
                                    lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi
                                    varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit
                                    risus at metus.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.
                                    Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae
                                    lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis
                                    fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum
                                    facilisis massa, a consequat purus viverra.
                                </p>
                            </div>
                            <div class="pr-list fl-wrap">
                                <div class="smart-features">
                                    <div class="features-header">
                                        <h2 class="features-title">
                                            Smart Features
                                        </h2>
                                        <p class="features-subtitle">Discover what makes our platform exceptional</p>
                                    </div>
                
                
                                    <div id="coreTab" class="feature-content active">
                                        <div class="feature-grid">
                                            <div class="feature-card">
                                                <div class="feature-icon">🏪</div>
                                                <div class="feature-name">Multi-Vendor Hub</div>
                                                <div class="feature-description">Unlimited vendor support with individual dashboards and
                                                    commission management</div>
                
                                            </div>
                
                                            <div class="feature-card">
                                                <div class="feature-icon">💳</div>
                                                <div class="feature-name">Smart Payments</div>
                                                <div class="feature-description">Secure payment processing with multiple gateway
                                                    integrations</div>
                
                                            </div>
                
                                            <div class="feature-card">
                                                <div class="feature-icon">📱</div>
                                                <div class="feature-name">Mobile First</div>
                                                <div class="feature-description">Progressive web app with offline capabilities and push
                                                    notifications</div>
                
                                            </div>
                                        </div>
                                    </div>
                
                                    <div id="advancedTab" class="feature-content">
                                        <div class="feature-grid">
                                            <div class="feature-card">
                                                <div class="feature-icon">🤖</div>
                                                <div class="feature-name">AI Recommendations</div>
                                                <div class="feature-description">Machine learning algorithms for personalized shopping
                                                    experiences</div>
                
                                            </div>
                
                                            <div class="feature-card">
                                                <div class="feature-icon">🔒</div>
                                                <div class="feature-name">Advanced Security</div>
                                                <div class="feature-description">Multi-layer security with fraud detection and data
                                                    encryption</div>
                
                                            </div>
                
                                            <div class="feature-card">
                                                <div class="feature-icon">🚀</div>
                                                <div class="feature-name">Performance Boost</div>
                                                <div class="feature-description">CDN integration and caching for lightning-fast load times
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                
                                    <div id="analyticsTab" class="feature-content">
                                        <div class="feature-grid">
                                            <div class="feature-card">
                                                <div class="feature-icon">📊</div>
                                                <div class="feature-name">Real-time Analytics</div>
                                                <div class="feature-description">Comprehensive dashboard with live sales and traffic data
                                                </div>
                
                                            </div>
                
                                            <div class="feature-card">
                                                <div class="feature-icon">📈</div>
                                                <div class="feature-name">Growth Insights</div>
                                                <div class="feature-description">Predictive analytics and growth recommendations</div>
                
                                            </div>
                
                                            <div class="feature-card">
                                                <div class="feature-icon">📋</div>
                                                <div class="feature-name">Custom Reports</div>
                                                <div class="feature-description">Generate detailed reports for any time period or metric
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pr-list fl-wrap">
                                <div class="pricing-grid">
                                    <div class="pricing-card">
                                        <div class="pricing-header">
                                            <div class="pricing-title">Starter Package</div>
                                            <div class="pricing-subtitle">Perfect for small businesses</div>
                                        </div>
                                        <div class="price-display">
                                            <span class="price-amount">$2,999</span>
                                            <div class="price-period">one-time payment</div>
                                        </div>
                                        <ul class="pricing-features">
                                            <li>Basic multi-vendor support</li>
                                            <li>Mobile responsive design</li>
                                            <li>Payment gateway integration</li>
                                            <li>Basic analytics dashboard</li>
                                            <li>6 months support</li>
                                        </ul>
                                        <button class="cta-button" onclick="selectPackage('starter')">Choose
                                            Starter</button>
                                    </div>

                                    <div class="pricing-card">
                                        <div class="pricing-header">
                                            <div class="pricing-title">Professional</div>
                                            <div class="pricing-subtitle">Most popular choice</div>
                                        </div>
                                        <div class="price-display">
                                            <span class="price-amount">$4,999</span>
                                            <div class="price-period">one-time payment</div>
                                        </div>
                                        <ul class="pricing-features">
                                            <li>Advanced multi-vendor features</li>
                                            <li>AI-powered recommendations</li>
                                            <li>Real-time analytics</li>
                                            <li>Custom admin dashboard</li>
                                            <li>12 months support</li>
                                            <li>SEO optimization</li>
                                        </ul>
                                        <button class="cta-button" onclick="selectPackage('pro')">Choose
                                            Professional</button>
                                    </div>

                                    <div class="pricing-card">
                                        <div class="pricing-header">
                                            <div class="pricing-title">Enterprise</div>
                                            <div class="pricing-subtitle">For large scale operations</div>
                                        </div>
                                        <div class="price-display">
                                            <span class="price-amount">$8,999</span>
                                            <div class="price-period">one-time payment</div>
                                        </div>
                                        <ul class="pricing-features">
                                            <li>Everything in Professional</li>
                                            <li>Custom integrations</li>
                                            <li>Advanced security features</li>
                                            <li>Priority support</li>
                                            <li>White-label solution</li>
                                            <li>24/7 monitoring</li>
                                            <li>Custom training</li>
                                        </ul>
                                        <button class="cta-button" onclick="selectPackage('enterprise')">Choose
                                            Enterprise</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!-- det box end-->
                <div class="content-nav mar-top">
                    <ul>
                        <li><a href="portfolio-single2.html" class="ln"><i class="fal fa-arrow-left"></i><span
                                    class="tooltip">Prev - KENT BRANT CONCEPT</span></a></li>
                        <li>
                            <a href="portfolio.html" class="cur-page"><span>All Projects</span></a>
                        </li>
                        <li><a href="portfolio-single3.html" class="rn"><i class="fal fa-arrow-right"></i><span
                                    class="tooltip">Next - BARBERSHOP WEBSITE </span></a></li>
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
                    <div class="col-md-4"><a href="contscts.html" class="btn flat-btn color-btn">Get In Touch</a> </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
@endsection


@section('js')
@endsection
