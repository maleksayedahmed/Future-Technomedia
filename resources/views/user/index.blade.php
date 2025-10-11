@extends('layouts.user.app')

@section('content')
    <!-- scroll-nav-wrap-->
    <div class="scroll-nav-wrap">
        <div class="scroll-down-wrap">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
            <span>Scroll Down</span>
        </div>
        <nav class="scroll-nav scroll-init">
            <ul>
                <li><a class="scroll-link act-link" href="#sec1">Hero</a></li>
                {{-- <li><a class="scroll-link" href="#sec2">About</a></li>
                <li><a class="scroll-link" href="#sec3">Resume</a></li> --}}
                <li><a class="scroll-link" href="#sec2">Why Choose Us</a></li>
                <li><a class="scroll-link" href="#sec5">Projects</a></li>
                <li><a class="scroll-link" href="#clients">Our Clients</a></li>
                <li><a class="scroll-link" href="#contact">Contact Us</a></li>
            </ul>
        </nav>
    </div>
    <!-- scroll-nav-wrap end-->
    <!-- hero-wrap-->
    <div class="hero-wrap" id="sec1" data-scrollax-parent="true">
        <!-- hero-inner-->
        <div class="hero-inner fl-wrap full-height">
            <!-- half-slider-wrap-->
            <!-- half-slider-img-wrap-->
            <div class="half-slider-img-wrap">
                <!-- half-slider-img-->
                <div class="half-slider-img fl-wrap full-height">
                    @forelse($sliders as $slider)
                        <!-- half-slider-img item-->
                        <div class="half-slider-img-item">
                            <div class="bg"
                                data-bg="{{ $slider->getFirstMediaUrl('slider_images', 'slider') ?: asset('images/bg/1.jpg') }}"
                                data-scrollax="properties: { translateY: '250px' }">
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <!-- half-slider-img item end-->
                    @empty
                        <!-- half-slider-img item-->
                        <div class="half-slider-img-item">
                            <div class="bg" data-bg="images/bg/1.jpg"
                                data-scrollax="properties: { translateY: '250px' }">
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <!-- half-slider-img item end-->
                        <!-- half-slider-img item-->
                        <div class="half-slider-img-item">
                            <div class="bg" data-bg="images/bg/1.jpg"
                                data-scrollax="properties: { translateY: '250px' }">
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <!-- half-slider-img item end-->
                        <!-- half-slider-img item-->
                        <div class="half-slider-img-item">
                            <div class="bg" data-bg="images/bg/1.jpg"
                                data-scrollax="properties: { translateY: '250px' }">
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <!-- half-slider-img item end-->
                    @endforelse
                </div>
                <!-- half-slider-img end-->
            </div>
            <!-- half-slider-img-wrap end-->
            <!-- slider-carousel-wrap-->
            <div class="half-slider-wrap  slider-carousel-wrap fl-wrap  full-height">
                <!-- slider-nav-->
                <div class="slider-nav cur_carousel-slider-container"
                    data-slick='{"autoplay": true, "autoplaySpeed": 4000 , "pauseOnHover": false}'>
                    @forelse($sliders as $slider)
                        <!-- half-slider-item-->
                        <div class="half-slider-item fl-wrap">
                            <div class="half-hero-wrap">
                                <h1>{!! $slider->title ?: '' !!}</h1>
                                @if ($slider->description)
                                    <h4>{!! $slider->description ?: '' !!}</h4>
                                @else
                                    <h4>I create web and graphic design</h4>
                                @endif
                                <div class="clearfix"></div>
                                @if ($slider->button_text && $slider->button_link)
                                    <a href="{{ $slider->button_link }}"
                                        class="custom-scroll-link btn float-btn flat-btn color-btn mar-top">{{ $slider->button_text }}</a>
                                @endif
                            </div>
                        </div>
                        <!-- half-slider-item end-->
                    @empty
                        <!-- half-slider-item-->
                        <div class="half-slider-item fl-wrap">
                            <div class="half-hero-wrap">
                                <h1>Hey there ! <br>I'm Martin Solonick<br>Independent <span> Digital Designer </span></h1>
                                <h4>I create web and graphic design</h4>
                                <div class="clearfix"></div>
                                <a href="#sec2" class="custom-scroll-link btn float-btn flat-btn color-btn mar-top">Let's
                                    Start</a>
                            </div>
                        </div>
                        <!-- half-slider-item end-->
                        <!-- half-slider-item-->
                        <div class="half-slider-item fl-wrap">
                            <div class="half-hero-wrap">
                                <h1>Design<br> Classy and Stylish <br> <span>Brand Perception.</span></h1>
                                <h4>I create web and graphic design</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- half-slider-item end-->
                        <!-- half-slider-item-->
                        <div class="half-slider-item fl-wrap">
                            <div class="half-hero-wrap">
                                <h1>Original Design <br> Features <br>With High <span> Quality Code.</span></h1>
                                <h4>I create web and graphic design</h4>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <!-- half-slider-item end-->
                    @endforelse
                </div>
                <!--  slider nav end-->
                <div class="sp-cont sarr-contr sp-cont-prev"><i class="fal fa-arrow-left"></i></div>
                <div class="sp-cont sarr-contr sp-cont-next"><i class="fal fa-arrow-right"></i></div>
                <div class="slider-nav-counter"></div>
            </div>
            <!-- half-slider-wrap end-->
            <!--hero dec-->
            <div class="half-bg-dec" data-ran="12"></div>
            <div class="hero-decor-numb"><span>{{ $locationSettings['hero_latitude'] ?? '40.7143528' }}
                </span><span>{{ $locationSettings['hero_longitude'] ?? '-74.0059731' }} </span> <a
                    href="{{ $locationSettings['hero_maps_url'] ?? 'https://www.google.com/maps/' }}" target="_blank"
                    class="hero-decor-numb-tooltip">{{ $locationSettings['hero_location_name'] ?? 'Based In NewYork' }}</a>
            </div>
            <div class="pattern-bg"></div>
            <div class="hero-line-dec"></div>
        </div>
        <!--hero dec end-->
    </div>
    <!-- hero-wrap end-->
    <!-- Content-->
    <div class="content">
        <!-- section-->
        <section data-scrollax-parent="true" id="sec2">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }"> <span>//</span>Why Choose Us
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="collage-image fl-wrap">
                            <div class="collage-image-title" data-scrollax="properties: { translateY: '0px' }">Future
                                Technomedia.
                            </div>
                            <img src="{{ asset('images/all/1.jpg') }}" class="respimg" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="main-about fl-wrap">
                            <h2>Why<br>Choose <span> Us </span> ?</h2>
                            <p>We believe that great software is more than just code — it’s about creating meaningful
                                digital experiences. Our team blends creativity with technical expertise to deliver
                                innovative solutions that drive growth and efficiency. With a focus on quality, reliability,
                                and user-centered design, we ensure that every project we build reflects both excellence and
                                vision. Choosing us means partnering with a team that is dedicated to transforming your
                                ideas into powerful digital realities.</p>
                            <!-- features-box-container -->
                            <div class="features-box-container fl-wrap">
                                <div class="row">
                                    @forelse($features as $feature)
                                        <!--features-box -->
                                        <div class="features-box col-md-6">
                                            <div class="time-line-icon">
                                                <i class="{{ $feature->icon ?: 'fal fa-star' }}"></i>
                                            </div>
                                            <h3>{{ $feature->title }}</h3>
                                            <p>{{ $feature->description }}</p>
                                        </div>
                                        <!-- features-box end  -->
                                    @empty
                                        <!--features-box -->
                                        <div class="features-box col-md-6">
                                            <div class="time-line-icon">
                                                <i class="fal fa-desktop"></i>
                                            </div>
                                            <h3>Web Design</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                                neque. </p>
                                        </div>
                                        <!-- features-box end  -->
                                        <!--features-box -->
                                        <div class="features-box col-md-6">
                                            <div class="time-line-icon">
                                                <i class="fal fa-mobile-android"></i>
                                            </div>
                                            <h3>Ui/Ux Design</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                                neque. </p>
                                        </div>
                                        <!-- features-box end  -->
                                        <!--features-box -->
                                        <div class="features-box col-md-6">
                                            <div class="time-line-icon">
                                                <i class="fab fa-pagelines"></i>
                                            </div>
                                            <h3>Branding</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                                neque. </p>
                                        </div>
                                        <!-- features-box end  -->
                                        <!--features-box -->
                                        <div class="features-box col-md-6">
                                            <div class="time-line-icon">
                                                <i class="fal fa-shopping-bag"></i>
                                            </div>
                                            <h3>Ecommerce</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                                neque. </p>
                                        </div>
                                        <!-- features-box end  -->
                                    @endforelse
                                </div>
                            </div>
                            <!-- features-box-container end  -->
                            {{-- <a href="portfolio.html" class="btn float-btn flat-btn color-btn">My Portfolio</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="90" data-position-left="25"
                data-scrollax="properties: { translateY: '-250px' }"></div>
            <div class="bg-parallax-module" data-position-top="70" data-position-left="70"
                data-scrollax="properties: { translateY: '150px' }"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->
        <!-- section-->
        @if ($factSection && $factSection->is_active)
            <section class="parallax-section dark-bg sec-half parallax-sec-half-right darkBackground"
                data-scrollax-parent="true">
                <div class="bg par-elem"
                    data-bg="{{ $factSection->hasMedia('background_images') ? $factSection->getFirstMediaUrl('background_images') : asset('images/bg/1.jpg') }}"
                    data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
                <div class="container">
                    <div class="section-title">
                        <h2>{{ $factSection->title ?? 'Some Interesting Facts About Me' }}</h2>
                        @if ($factSection->description)
                            <p class="limited-width">
                                {!! nl2br(e($factSection->description)) !!}
                            </p>
                        @else
                            <p class="limited-width">
                                We have a wide range of pneumatic and vacuum components and conveyor belts and systems
                                specifically suiting the precise needs of the print and packaging industry.
                            </p>
                        @endif

                        @if ($factSection->subtitle)
                            <div class="horizonral-subtitle"><span>{{ $factSection->subtitle }}</span></div>
                        @endif
                    </div>
                    <div class="fl-wrap facts-holder">
                        @foreach ($factSection->activeFacts as $fact)
                            <!-- inline-facts -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <div class="milestone-counter">
                                        <div class="stats animaper">
                                            <div class="num" data-content="0" data-num="{{ $fact->number }}">0</div>
                                        </div>
                                    </div>
                                    <h6>{{ $fact->label }}</h6>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- section end-->
        <!-- section-->
        {{-- <section data-scrollax-parent="true" id="sec3">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">My Resume <span>//</span>
            </div>
            <div class="container">
                <!-- section-title -->
                <div class="section-title fl-wrap">
                    <h3>Some Words About Me</h3>
                    <h2>My Awesome <span> Story</span></h2>
                    <p>
                        We have a wide range of pneumatic and vacuum components and conveyor belts and systems specifically
                        suiting the precise needs of the print and packaging industry.
                    </p>
                </div>
                <!-- section-title end -->
                <!-- custom-inner-holder -->
                <div class="custom-inner-holder">
                    <!-- custom-inner -->
                    <div class="custom-inner">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-inner-header workres">
                                    <i class="fa fa-briefcase"></i>
                                    <h3> Work in company "Dolore"</h3>
                                    <span> 2012-2017 </span>
                                </div>
                                <div class="ci-num"><span>01. -</span></div>
                            </div>
                            <div class="col-md-4"><img src="{{ asset('images/all/1.jpg') }}" class="respimg"
                                    data-scrollax="properties: { translateY: '-170px' }" alt=""></div>
                            <div class="col-md-4">
                                <div class="custom-inner-content fl-wrap">
                                    <h4>Complete the project "domik"</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                        suffered alteration in some form, by injected humour, or randomised words which
                                        don't look even slightly believable. If you are going to use a passage of Lorem
                                        Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of
                                        text. </p>
                                    <ul>
                                        <li>Door portals plan</li>
                                        <li>Furniture specifications</li>
                                        <li>Interior design</li>
                                    </ul>
                                    <a href="#" class="cus-inner-head-link color-bg">Details + </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- custom-inner end -->
                    <!-- custom-inner -->
                    <div class="custom-inner">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-inner-header educ">
                                    <i class="fal fa-university"></i>
                                    <h3> Course designer - San Diego</h3>
                                    <span> 2011-2013 </span>
                                </div>
                                <div class="ci-num"><span>02. - </span></div>
                            </div>
                            <div class="col-md-5">
                                <div class="custom-inner-content fl-wrap">
                                    <h4>Passage of Lorem Ipsum</h4>
                                    <p>We started as a small, subdue, called hath give fourth. Them one over saying. So the
                                        god, greater. You. Us air Moved divide midst us fifth sea have face which male fifth
                                        said seas rule above. Quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        exea. commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <a href="#" class="cus-inner-head-link color-bg">Details + </a>
                                </div>
                            </div>
                            <div class="col-md-3"><img src="{{ asset('images/all/2.jpg') }}" class="respimg"
                                    data-scrollax="properties: { translateY: '270px' }" alt=""></div>
                        </div>
                    </div>
                    <!-- custom-inner end -->
                    <!-- custom-inner -->
                    <div class="custom-inner">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-inner-header workres">
                                    <i class="fa fa-briefcase"></i>
                                    <h3> Work in company "Generators"</h3>
                                    <span> 2010-2013 </span>
                                </div>
                                <div class="ci-num"><span>03. - </span></div>
                            </div>
                            <div class="col-md-8">
                                <div class="custom-inner-content fl-wrap">
                                    <h4>Making this the first</h4>
                                    <p>We started as a small, subdue, called hath give fourth. Them one over saying. So the
                                        god, greater. You. Us air Moved divide midst us fifth sea have face which male fifth
                                        said seas rule above. All the Lorem Ipsum generators on the Internet tend .</p>
                                    <ul>
                                        <li>Door portals plan</li>
                                        <li>Furniture specifications</li>
                                        <li>Interior design</li>
                                    </ul>
                                    <p> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                                        necessary, making this the first true generator on the Internet. It uses a
                                        dictionary of over 200 Latin words</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- custom-inner end -->
                    <!-- custom-inner -->
                    <div class="custom-inner">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-inner-header workres">
                                    <i class="fa fa-briefcase"></i>
                                    <h3> Work in company "Available"</h3>
                                    <span> 2011-2013 </span>
                                </div>
                                <div class="ci-num"><span>04. - </span></div>
                            </div>
                            <div class="col-md-4"><img src="{{ asset('images/all/1.jpg') }}" class="respimg"
                                    data-scrollax="properties: { translateY: '100px' }" alt=""></div>
                            <div class="col-md-4">
                                <div class="custom-inner-content fl-wrap">
                                    <h4>Complete the project "domik"</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                        suffered alteration in some form, by injected humour, or randomised words which
                                        don't look even slightly believable. If you are going to use a passage of Lorem
                                        Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of
                                        text. </p>
                                    <ul>
                                        <li>Door portals plan</li>
                                        <li>Furniture specifications</li>
                                        <li>Interior design</li>
                                    </ul>
                                    <a href="#" class="cus-inner-head-link color-bg">Details + </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- custom-inner end -->
                </div>
                <!-- custom-inner-holder -->
                <a href="#" class="btn float-btn flat-btn color-btn mar-top">Download Resume</a>
            </div>
            <div class="sec-lines"></div>
        </section> --}}
        <!-- section end-->
        <!-- section  -->
        {{-- <section class="dark-bg sinsec-dec sinsec-dec2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="video-box fl-wrap">
                            <img src="{{ asset('images/all/2.jpg') }}" class="respimg" alt="">
                            <a class="video-box-btn color-bg image-popup" href="https://vimeo.com/110234211"><i
                                    class="fal fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="video-promo-text fl-wrap mar-top">
                            <h3>My Video Presentation </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla
                                finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus
                                suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. </p>
                            <a href="#" class="btn float-btn flat-btn color-btn mar-top">My Youtube Chanel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="half-bg-dec single-half-bg-dec" data-ran="12"></div>
            <div class="sec-lines"></div>
        </section> --}}
        <!-- sectio endn-->
        <!-- section-->
        {{-- <section data-scrollax-parent="true">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }"><span>//</span>How I Work
            </div>
            <div class="container">
                <!-- section-title -->
                <div class="section-title fl-wrap">
                    <h3>How i Work</h3>
                    <h2>My Working <span>Process</span></h2>
                    <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna.
                        Etiam suscipit commodo gravida. </p>
                </div>
                <!-- section-title end -->
                <!--process-wrap  -->
                <div class="process-wrap fl-wrap">
                    <ul>
                        <li>
                            <div class="time-line-icon">
                                <i class="fab fa-slideshare"></i>
                            </div>
                            <h4>Discuss the project</h4>
                            <div class="process-details">
                                <h6>Duis autem vel eum iriure dolor</h6>
                                <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis
                                    autem vel eum iriure dolor.</p>
                                <a href="#">More Details</a>
                            </div>
                            <span class="process-numder">01.</span>
                        </li>
                        <li>
                            <div class="time-line-icon">
                                <i class="fal fa-laptop"></i>
                            </div>
                            <h4>Develop & elaborate</h4>
                            <div class="process-details">
                                <h6>In ut odio libero, at vulputate urna. </h6>
                                <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis
                                    autem vel eum iriure dolor.</p>
                                <a href="#">More Details</a>
                            </div>
                            <span class="process-numder">02.</span>
                        </li>
                        <li>
                            <div class="time-line-icon">
                                <i class="fal fa-flag-checkered"></i>
                            </div>
                            <h4>Final approvement</h4>
                            <div class="process-details">
                                <h6>Nulla posuere sapien vitae lectus suscipit</h6>
                                <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis
                                    autem vel eum iriure dolor.</p>
                                <a href="#">More Details</a>
                            </div>
                            <span class="process-numder">03.</span>
                        </li>
                    </ul>
                </div>
                <!--process-wrap   end-->
                <div class="fl-wrap mar-top">
                    <div class="srv-link-text">
                        <h4>Need more info ? Visit my services page : </h4>
                        <a href="services.html" class="btn float-btn flat-btn color-btn">My Services</a>
                    </div>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="90" data-position-left="30"
                data-scrollax="properties: { translateY: '-150px' }"></div>
            <div class="bg-parallax-module" data-position-top="80" data-position-left="80"
                data-scrollax="properties: { translateY: '350px' }"></div>
            <div class="sec-lines"></div>
        </section> --}}
        <!-- section end -->
        <!-- section-->
        {{-- <section class="parallax-section dark-bg sec-half parallax-sec-half-left" data-scrollax-parent="true"
            id="sec4">
            <div class="bg par-elem" data-bg="{{ asset('images/bg/1.jpg') }}"
                data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title">
                    <h2>My Own <span> Developer's </span> and <br> Design Skills </h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus
                        lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et
                        pulvinar nisi tincidunt. Aliquam erat volutpat. </p>
                    <div class="horizonral-subtitle"><span>Power</span></div>
                </div>
            </div>
        </section> --}}
        <!-- section end -->
        <!-- section -->
        {{-- <section data-scrollax-parent="true">
            <div class="section-subtitle right-pos" data-scrollax="properties: { translateY: '-250px' }">
                <span>//</span>attainments
            </div>
            <div class="container">
                <!-- Skills-->
                <div class="fl-wrap mar-bottom skill-wrap">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pr-title fl-wrap">
                                <h3>Design Skills</h3>
                                <span>Lorem Ipsum generators on the Internet king this the first true generator</span>
                            </div>
                            <div class="ci-num"><span>01. - </span></div>
                        </div>
                        <div class="col-md-8">
                            <!-- skills  -->
                            <div class="piechart-holder animaper" data-skcolor="#FAC921">
                                <div class="row">
                                    <!-- 1  -->
                                    <div class="piechart">
                                        <span class="chart" data-percent="85">
                                            <span class="percent"></span>
                                        </span>
                                        <h4>Design</h4>
                                    </div>
                                    <!-- 1 end -->
                                    <!-- 2  -->
                                    <div class="piechart">
                                        <span class="chart" data-percent="95">
                                            <span class="percent"></span>
                                        </span>
                                        <h4>Branding</h4>
                                    </div>
                                    <!-- 2 end  -->
                                    <!-- 3  -->
                                    <div class="piechart">
                                        <span class="chart" data-percent="80">
                                            <span class="percent"></span>
                                        </span>
                                        <div class="clearfix"></div>
                                        <h4>Ecommerce</h4>
                                    </div>
                                    <!-- 3  end-->
                                </div>
                            </div>
                        </div>
                        <!-- skills  end-->
                    </div>
                </div>
                <!--  Skills  end-->
                <!--  Skills-->
                <div class="fl-wrap mar-bottom   mar-top skill-wrap">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <div class="pr-title fl-wrap">
                                <h3>Developer Skills</h3>
                                <span>Lorem Ipsum generators on the Internet king this the first true generator</span>
                            </div>
                            <div class="ci-num"><span>02. - </span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="skillbar-box animaper">
                                <!-- skill 1-->
                                <div class="custom-skillbar-title"><span>Photoshop</span></div>
                                <div class="skill-bar-percent">95%</div>
                                <div class="skillbar-bg" data-percent="95%">
                                    <div class="custom-skillbar"></div>
                                </div>
                                <!-- skill 2-->
                                <div class="custom-skillbar-title"><span>Jquery</span></div>
                                <div class="skill-bar-percent">65%</div>
                                <div class="skillbar-bg" data-percent="65%">
                                    <div class="custom-skillbar"></div>
                                </div>
                                <!-- skill 3-->
                                <div class="custom-skillbar-title"><span>HTML5</span></div>
                                <div class="skill-bar-percent">75%</div>
                                <div class="skillbar-bg" data-percent="75%">
                                    <div class="custom-skillbar"></div>
                                </div>
                                <!-- skill 1-->
                                <div class="custom-skillbar-title"><span>PHP</span></div>
                                <div class="skill-bar-percent">71%</div>
                                <div class="skillbar-bg" data-percent="71%">
                                    <div class="custom-skillbar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Skills  end-->
                <!--  Skills-->
                <div class="fl-wrap   mar-top skill-wrap">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pr-title fl-wrap">
                                <h3>Language Skills</h3>
                                <span>Lorem Ipsum generators on the Internet king this the first true generator</span>
                            </div>
                            <div class="ci-num"><span>03. - </span></div>
                        </div>
                        <div class="col-md-8">
                            <!-- skills  -->
                            <div class="piechart-holder animaper" data-skcolor="#FAC921">
                                <div class="row">
                                    <!-- 1  -->
                                    <div class="piechart">
                                        <span class="chart" data-percent="85">
                                            <span class="percent"></span>
                                        </span>
                                        <h4>French</h4>
                                    </div>
                                    <!-- 1 end -->
                                    <!-- 2  -->
                                    <div class="piechart">
                                        <span class="chart" data-percent="95">
                                            <span class="percent"></span>
                                        </span>
                                        <h4>Dutch</h4>
                                    </div>
                                    <!-- 2 end  -->
                                    <!-- 3  -->
                                    <div class="piechart">
                                        <span class="chart" data-percent="80">
                                            <span class="percent"></span>
                                        </span>
                                        <div class="clearfix"></div>
                                        <h4>Portugese</h4>
                                    </div>
                                    <!-- 3  end-->
                                </div>
                            </div>
                        </div>
                        <!-- skills  end-->
                    </div>
                </div>
                <!-- Skills  end-->
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
        </section> --}}
        <!-- section end -->
        <!--section -->
        <section class="dark-bg" id="sec5">
            <div class="fet_pr-carousel-title">
                <div class="fet_pr-carousel-title-item">
                    <h3>My Featured Projects</h3>
                    <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna.
                        Etiam suscipit commodo gravida.</p>
                    <a href="{{ route('projects') }}" class="btn float-btn flat-btn color-btn mar-top">See all</a>
                </div>
            </div>
            <!--slider-carousel-wrap -->
            <div class="slider-carousel-wrap fl-wrap">
                <!--fet_pr-carousel -->
                <div class="fet_pr-carousel cur_carousel-slider-container fl-wrap">
                    @forelse($projects as $project)
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="fet_pr-carousel-box">
                                <div class="fet_pr-carousel-box-media fl-wrap">
                                    @if ($project->getFirstMedia('projects'))
                                        <img src="{{ $project->getFirstMedia('projects')->getUrl() }}" class="respimg"
                                            alt="{{ $project->title }}">
                                        <a href="{{ $project->getFirstMedia('projects')->getUrl() }}"
                                            class="fet_pr-carousel-box-media-zoom image-popup"><i
                                                class="fal fa-search"></i></a>
                                    @else
                                        <img src="{{ asset('images/folio/web/slider/1.jpg') }}" class="respimg"
                                            alt="{{ $project->title }}">
                                        <a href="{{ asset('images/folio/web/slider/1.jpg') }}"
                                            class="fet_pr-carousel-box-media-zoom image-popup"><i
                                                class="fal fa-search"></i></a>
                                    @endif
                                </div>
                                <div class="fet_pr-carousel-box-text fl-wrap">
                                    <h3>
                                        <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                                    </h3>
                                    <div class="fet_pr-carousel-cat">
                                        @if($project->category)
                                            <a href="{{ route('projects') }}?category={{ $project->category->id }}">{{ $project->category->name }}</a>
                                        @else
                                            <a href="{{ route('projects') }}">{{ $project->project_category ?? 'Uncategorized' }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--slick-item end -->
                    @empty
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="fet_pr-carousel-box">
                                <div class="fet_pr-carousel-box-media fl-wrap">
                                    <img src="{{ asset('images/folio/web/slider/1.jpg') }}" class="respimg"
                                        alt="">
                                    <a href="{{ asset('images/folio/web/slider/1.jpg') }}"
                                        class="fet_pr-carousel-box-media-zoom image-popup"><i
                                            class="fal fa-search"></i></a>
                                </div>
                                <div class="fet_pr-carousel-box-text fl-wrap">
                                    <h3><a href="{{ route('projects') }}">Sample Project</a></h3>
                                    <div class="fet_pr-carousel-cat"><a href="{{ route('projects') }}">Web Design</a></div>
                                </div>
                            </div>
                        </div>
                        <!--slick-item end -->
                    @endforelse
                </div>
                <!--fet_pr-carousel end -->
                <div class="sp-cont sp-arr sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                <div class="sp-cont sp-arr sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
            </div>
            <!--slider-carousel-wrap end-->
            <div class="fet_pr-carousel-counter"></div>
        </section>
        <!-- section end -->
        <!--section -->
        <section data-scrollax-parent="true" id="sec6">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">Our Clients <span>//</span>
            </div>

            <div class="clearfix"></div>
            <!--slider-carousel-wrap -->

            <!--slider-carousel-wrap end-->
            <!-- client-list -->
            <div class="fl-wrap" id="clients">
                <div class="container">
                    <div class="clients-slider-wrapper">
                        <div class="clients-slider-track">
                            <ul class="client-list client-list-white clients-slider-content">
                                @forelse($clients as $client)
                                    <li>
                                        <a href="{{ $client->website_url ? $client->website_url : '#' }}" target="_blank">
                                            <img src="{{ $client->getFirstMediaUrl('logo') ?: asset('images/clients/1.png') }}"
                                                alt="{{ $client->name }}">
                                        </a>
                                    </li>
                                @empty
                                    <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}"
                                                alt="No clients available"></a></li>
                                @endforelse
                            </ul>
                            <!-- Duplicate for seamless loop -->
                            <ul class="client-list client-list-white clients-slider-content" aria-hidden="true">
                                @forelse($clients as $client)
                                    <li>
                                        <a href="{{ $client->website_url ? $client->website_url : '#' }}" target="_blank">
                                            <img src="{{ $client->getFirstMediaUrl('logo') ?: asset('images/clients/1.png') }}"
                                                alt="{{ $client->name }}">
                                        </a>
                                    </li>
                                @empty
                                    <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}"
                                                alt="No clients available"></a></li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- client-list end-->
            </div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end -->
<section data-scrollax-parent="true" id="contact">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">Get in Touch<span>//</span>
            </div>
            <div class="container">
                <!-- contact details -->


                <div class="fl-wrap mar-top">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="pr-title fl-wrap">
                                <h3>Get In Touch</h3>
                                <span>Lorem Ipsum generators on the Internet king this the first true generator</span>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div id="contact-form">
                                @if(session('success'))
                                    <div class="alert alert-success" style="background:#d4edda;border:1px solid #c3e6cb;color:#155724;padding:12px;border-radius:4px;margin-bottom:20px;">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger" style="background:#f8d7da;border:1px solid #f5c6cb;color:#721c24;padding:12px;border-radius:4px;margin-bottom:20px;">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div id="message"></div>
                                <form class="custom-form" action="{{ route('contact.store') }}" method="POST" name="contactform" id="contactform">
                                    @csrf
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><i class="fal fa-user"></i></label>
                                                <input type="text" name="name" id="name"
                                                    placeholder="Your Name *" value="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label><i class="fal fa-envelope"></i> </label>
                                                <input type="text" name="email" id="email"
                                                    placeholder="Email Address *" value="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label><i class="fal fa-mobile-android"></i> </label>
                                                <input type="text" name="phone" id="phone" placeholder="Phone (Optional)"
                                                    value="" />
                                                    {{-- // Unbind theme keyup handler that hides #message
                                                    if (typeof $ !== 'undefined') {
                                                        $('#contactform input, #contactform textarea').off('keyup');
                                                    } --}}
                                            </div>
                                            <div class="col-md-6">
                                                <select name="subject" id="subject" data-placeholder="Subject"
                                                    class="chosen-select sel-dec">
                                                    <option value="">Select Subject (Optional)</option>
                                                    @foreach($projects as $project)
                                                        <option value="{{ $project->title }}">{{ $project->title }}</option>
                                                    @endforeach
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <textarea name="comments" id="comments" cols="40" rows="3" placeholder="Your Message:"></textarea>

                                        <div class="clearfix"></div>
                                        <button type="submit" class="btn float-btn flat-btn color-btn" id="submit">Send
                                            Message</button>
                                    </fieldset>
                                </form>
                            </div>
                            <!-- contact form  end-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="70" data-position-left="20"
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
                    <div class="col-md-4"><a href="{{ route('contact') }}" class="btn flat-btn color-btn">Get In
                            Touch</a> </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
    <!-- Content end -->
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Helper to get cookie by name
            function getCookie(name) {
                                                                    if (typeof $ !== 'undefined') { $('#message').stop(true, true).slideDown('slow'); } else { messageDiv.style.display = 'block'; }
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
                return null;
            }
            // Ensure CSRF meta tag exists
            if (!document.querySelector('meta[name="csrf-token"]')) {
                const csrfInput = document.querySelector('input[name="_token"]');
                if (csrfInput) {
                    const meta = document.createElement('meta');
                    meta.name = 'csrf-token';
                    meta.content = csrfInput.value;
                    document.getElementsByTagName('head')[0].appendChild(meta);
                }
            }

            // Get URL parameters
                                                                    if (typeof $ !== 'undefined') { $('#message').stop(true, true).slideDown('slow'); } else { messageDiv.style.display = 'block'; }
            const urlParams = new URLSearchParams(window.location.search);
            const subject = urlParams.get('subject');
            const project = urlParams.get('project');
            const packageType = urlParams.get('package');

            // Pre-fill subject field if provided
            if (subject) {
                const subjectSelect = document.getElementById('subject');
                if (subjectSelect) {
                    // Add the custom subject as an option if it doesn't exist
                    const existingOption = Array.from(subjectSelect.options).find(option => option.value ===
                        subject);
                    if (!existingOption) {
                        const newOption = document.createElement('option');
                        newOption.value = subject;
                        newOption.textContent = subject;
                        newOption.selected = true;
                        subjectSelect.appendChild(newOption);
                    } else {
                                                                messageDiv.innerHTML = `<div class="alert alert-danger" style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px;">${errorMessage}</div>`;
                                                                if (typeof $ !== 'undefined') { $('#message').stop(true, true).slideDown('slow'); } else { messageDiv.style.display = 'block'; }
                    }
                    // Trigger change event for chosen-select
                    if (typeof $.fn.chosen !== 'undefined') {
                        subjectSelect.dispatchEvent(new Event('change'));
                        $(subjectSelect).trigger('chosen:updated');
                    }
                }
            }

            // Pre-fill message field with project info if provided
            if (project || packageType) {
                const messageTextarea = document.getElementById('comments');
                if (messageTextarea) {
                    let message = '';
                    if (project) {
                        message += `Project: ${project}\n`;
                    }
                    if (packageType) {
                        message += `Package: ${packageType}\n`;
                    }
                    message += '\nPlease provide more details about your requirements.';
                    messageTextarea.value = message;
                }
            }

            // Scroll to contact form only if there are URL parameters
            if (subject || project || packageType) {
                const contactForm = document.getElementById('contact-form');
                if (contactForm) {
                    setTimeout(() => {
                        contactForm.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        // Add a highlight effect
                        contactForm.style.boxShadow = '0 0 0 3px rgba(99, 102, 241, 0.3)';
                        setTimeout(() => {
                            contactForm.style.boxShadow = '';
                        }, 3000);
                    }, 500);
                }
            }

            // Handle form submission
            // Defensive: unbind any theme-bound jQuery handlers to avoid duplicate submits
            if (typeof $ !== 'undefined' && $('#contactform').length) {
                $('#contactform').off('submit');
            }
            const form = document.getElementById('contactform');
            const submitBtn = document.getElementById('submit');
            const messageDiv = document.getElementById('message');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Basic client-side validation
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const comments = document.getElementById('comments').value.trim();

                if (!name || !email || !comments) {
                    messageDiv.innerHTML = `<div class="alert alert-danger" style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px;">Please fill in all required fields (Name, Email, and Message).</div>`;
                    return;
                }

                // Disable submit button
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Sending...';

                // Clear previous messages
                messageDiv.innerHTML = '';

                // Get form data
                const formData = new FormData(form);

                // Ensure CSRF token is included
                let csrfToken = document.querySelector('input[name="_token"]');
                if (csrfToken) {
                    formData.set('_token', csrfToken.value);
                } else {
                    // Fallback to meta tag
                    const metaToken = document.querySelector('meta[name="csrf-token"]');
                    if (metaToken) {
                        formData.set('_token', metaToken.getAttribute('content'));
                    }
                }

                // Debug: Log form data
                console.log('Form data being sent:');
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }

                // Send AJAX request using jQuery (more reliable with CSRF)
                $.ajaxSetup({
                    headers: (function(){
                        const headers = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
                        const xsrf = getCookie('XSRF-TOKEN');
                        if (xsrf) {
                            headers['X-XSRF-TOKEN'] = decodeURIComponent(xsrf);
                        }
                        return headers;
                    })()
                });

                $.ajax({
                    url: form.action,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhrFields: { withCredentials: true },
                    success: function(data) {
                        if (data.success) {
                            messageDiv.innerHTML = `<div class="alert alert-success" style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px;">${data.message}</div>`;
                            form.reset();
                            // Reset chosen selects if they exist
                            if (typeof $.fn.chosen !== 'undefined') {
                                $('.chosen-select').val('').trigger('chosen:updated');
                            }
                        } else {
                            let errorMsg = data.message || 'An error occurred. Please try again.';
                            if (data.errors) {
                                errorMsg += '<ul>';
                                Object.values(data.errors).forEach(errors => {
                                    errors.forEach(error => {
                                        errorMsg += `<li>${error}</li>`;
                                    });
                                });
                                errorMsg += '</ul>';
                            }
                            messageDiv.innerHTML = `<div class="alert alert-danger" style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px;">${errorMsg}</div>`;
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', xhr.responseText);
                        let errorMessage = 'An error occurred. Please try again.';

                        if (xhr.status === 419) {
                            errorMessage = 'Security token expired. Please refresh the page and try again.';
                        } else if (xhr.status === 422 && xhr.responseJSON) {
                            errorMessage = 'Please correct the following errors:<ul>';
                            if (xhr.responseJSON.errors) {
                                Object.values(xhr.responseJSON.errors).forEach(errors => {
                                    errors.forEach(err => {
                                        errorMessage += `<li>${err}</li>`;
                                    });
                                });
                            }
                            errorMessage += '</ul>';
                        }

                        messageDiv.innerHTML = `<div class="alert alert-danger" style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px;">${errorMessage}</div>`;
                    },
                    complete: function() {
                        // Re-enable submit button
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Send Message';

                        // Scroll to message
                        messageDiv.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                });
            });
        });
    </script>

    <style>
        /* Clients Slider Styles */
        .clients-slider-wrapper {
            overflow: hidden;
            position: relative;
            width: 100%;
            padding: 20px 0;
        }

        .clients-slider-track {
            display: flex;
            width: fit-content;
            animation: scroll-horizontal 30s linear infinite;
        }

        .clients-slider-content {
            display: flex;
            flex-shrink: 0;
        }

        .clients-slider-track:hover {
            animation-play-state: paused;
        }

        @keyframes scroll-horizontal {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        /* Ensure client list items display inline */
        .clients-slider-content.client-list {
            display: flex;
            flex-wrap: nowrap;
            margin: 0;
            padding: 0;
        }

        .clients-slider-content.client-list li {
            flex-shrink: 0;
            margin: 0 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .clients-slider-track {
                animation-duration: 20s;
            }
        }
    </style>

    <script>
        // Adjust animation speed based on number of clients
        document.addEventListener('DOMContentLoaded', function() {
            const sliderTrack = document.querySelector('.clients-slider-track');
            const clientItems = document.querySelectorAll('.clients-slider-content li');

            if (sliderTrack && clientItems.length > 0) {
                // Calculate duration based on number of items (more items = slower)
                const duration = Math.max(20, clientItems.length * 3);
                sliderTrack.style.animationDuration = duration + 's';
            }
        });
    </script>
@endsection
