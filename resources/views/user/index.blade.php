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
                <li><a class="scroll-link" href="#sec4">Why Choose Us</a></li>
                <li><a class="scroll-link" href="#sec5">Projects</a></li>
                <li><a class="scroll-link" href="#sec6">Testimonials</a></li>
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
                    <!-- half-slider-img item-->
                    <div class="half-slider-img-item">
                        <div class="bg" data-bg="{{ asset('images/bg/1.jpg') }}"
                            data-scrollax="properties: { translateY: '250px' }"></div>
                        <div class="overlay"></div>
                    </div>
                    <!-- half-slider-img item end-->
                    <!-- half-slider-img item-->
                    <div class="half-slider-img-item">
                        <div class="bg" data-bg="{{ asset('images/bg/1.jpg') }}"
                            data-scrollax="properties: { translateY: '250px' }"></div>
                        <div class="overlay"></div>
                    </div>
                    <!-- half-slider-img item end-->
                    <!-- half-slider-img item-->
                    <div class="half-slider-img-item">
                        <div class="bg" data-bg="{{ asset('images/bg/1.jpg') }}"
                            data-scrollax="properties: { translateY: '250px' }"></div>
                        <div class="overlay"></div>
                    </div>
                    <!-- half-slider-img item end-->
                </div>
                <!-- half-slider-img end-->
            </div>
            <!-- half-slider-img-wrap end-->
            <!-- slider-carousel-wrap-->
            <div class="half-slider-wrap  slider-carousel-wrap fl-wrap  full-height">
                <!-- slider-nav-->
                <div class="slider-nav cur_carousel-slider-container"
                    data-slick='{"autoplay": true, "autoplaySpeed": 4000 , "pauseOnHover": false}'>
                    <!-- half-slider-item-->
                    <div class="half-slider-item fl-wrap">
                        <div class="half-hero-wrap">
                            <h1>Hey there ! <br>Its Future Technomedia<br>Innovative <span> Software Company </span></h1>
                            <div class="clearfix"></div>
                            <a href="#sec2" class="custom-scroll-link btn float-btn flat-btn color-btn mar-top">Let's
                                Start</a>
                        </div>
                    </div>
                    <!-- half-slider-item end-->
                    <!-- half-slider-item-->
                    <div class="half-slider-item fl-wrap">
                        <div class="half-hero-wrap">
                            <h1>Innovate<br> Smart and Powerful <br> <span>Digital Solutions.</span></h1>
                            <div class="clearfix"></div>
                            <a href="portfolio.html" class="btn float-btn flat-btn color-btn mar-top">My Portfolio</a>
                        </div>
                    </div>
                    <!-- half-slider-item end-->
                    <!-- half-slider-item-->
                    <div class="half-slider-item fl-wrap">
                        <div class="half-hero-wrap">
                            <h1>Smart Digital<br> Solutions <br>With Scalable<span>Software Power.</span></h1>
                            <div class="clearfix"></div>
                            <a href="services.html" class="btn float-btn flat-btn color-btn mar-top">My services</a>
                        </div>
                    </div>
                    <!-- half-slider-item end-->
                </div>
            </div>
            <!-- half-slider-wrap end-->
            <!--hero dec-->
            {{-- <div class="half-bg-dec" data-ran="12"></div> --}}
            <div class="pattern-bg"></div>
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
        {{-- <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
            <div class="bg par-elem" data-bg="{{ asset('images/bg/1.jpg') }}"
                data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title">
                    <h2>Some Interisting <span>Facts </span> <br> About Me</h2>
                    <p> We have a wide range of pneumatic and vacuum components and conveyor belts and systems specifically
                        suiting the precise needs of the print and packaging industry. </p>
                    <div class="horizonral-subtitle"><span>Numbers</span></div>
                </div>
                <div class="fl-wrap facts-holder">
                    <!-- inline-facts -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="145">0</div>
                                </div>
                            </div>
                            <h6>Finished projects</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="357">0</div>
                                </div>
                            </div>
                            <h6>Happy customers</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="825">0</div>
                                </div>
                            </div>
                            <h6>Working hours</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="1124">0</div>
                                </div>
                            </div>
                            <h6>Coffee Cups</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                </div>
            </div>
        </section> --}}
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
                    <a href="portfolio.html" class="btn float-btn flat-btn color-btn mar-top">See all</a>
                </div>
            </div>
            <!--slider-carousel-wrap -->
            <div class="slider-carousel-wrap fl-wrap">
                <!--fet_pr-carousel -->
                <div class="fet_pr-carousel cur_carousel-slider-container fl-wrap">
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="fet_pr-carousel-box">
                            <div class="fet_pr-carousel-box-media fl-wrap">
                                <img src="{{ asset('images/folio/web/slider/1.jpg') }}" class="respimg" alt="">
                                <a href="{{ asset('images/folio/web/slider/1.jpg') }}"
                                    class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                            </div>
                            <div class="fet_pr-carousel-box-text fl-wrap">
                                <h3><a href="portfolio-single.html">Lokomotive Project</a></h3>
                                <div class="fet_pr-carousel-cat"><a href="#">Branding</a> <a href="#">Web
                                        Design</a></div>
                            </div>
                        </div>
                    </div>
                    <!--slick-item end -->
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="fet_pr-carousel-box">
                            <div class="fet_pr-carousel-box-media fl-wrap">
                                <img src="{{ asset('images/folio/web/slider/1.jpg') }}" class="respimg" alt="">
                                <a href="https://vimeo.com/183619886"
                                    class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-play"></i></a>
                            </div>
                            <div class="fet_pr-carousel-box-text fl-wrap">
                                <h3><a href="portfolio-single.html">Architecture Agensy</a></h3>
                                <div class="fet_pr-carousel-cat"><a href="#">Photography</a> <a href="#">Web
                                        Design</a></div>
                            </div>
                        </div>
                    </div>
                    <!--slick-item end -->
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="fet_pr-carousel-box">
                            <div class="fet_pr-carousel-box-media fl-wrap">
                                <img src="{{ asset('images/folio/web/slider/1.jpg') }}" class="respimg" alt="">
                                <a href="{{ asset('images/folio/web/slider/1.jpg') }}"
                                    class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                            </div>
                            <div class="fet_pr-carousel-box-text fl-wrap">
                                <h3><a href="portfolio-single.html">Corporate website</a></h3>
                                <div class="fet_pr-carousel-cat"><a href="#">Branding</a> <a href="#">Web</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--slick-item end -->
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="fet_pr-carousel-box">
                            <div class="fet_pr-carousel-box-media fl-wrap">
                                <img src="{{ asset('images/folio/web/slider/1.jpg') }}" class="respimg" alt="">
                                <a href="{{ asset('images/folio/web/slider/1.jpg') }}"
                                    class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                            </div>
                            <div class="fet_pr-carousel-box-text fl-wrap">
                                <h3><a href="portfolio-single.html">Mobile ui Interface</a></h3>
                                <div class="fet_pr-carousel-cat"><a href="#">UI/UX</a> <a href="#">Web
                                        Design</a></div>
                            </div>
                        </div>
                    </div>
                    <!--slick-item end -->
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="fet_pr-carousel-box">
                            <div class="fet_pr-carousel-box-media fl-wrap">
                                <img src="{{ asset('images/folio/web/slider/1.jpg') }}" class="respimg" alt="">
                                <a href="{{ asset('images/folio/web/slider/1.jpg') }}"
                                    class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                            </div>
                            <div class="fet_pr-carousel-box-text fl-wrap">
                                <h3><a href="portfolio-single.html">Fashion Agensy</a></h3>
                                <div class="fet_pr-carousel-cat"><a href="#">Development</a> <a href="#">Web
                                        Design</a></div>
                            </div>
                        </div>
                    </div>
                    <!--slick-item end -->
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
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">Testimonials
            </div>
            <div class="container">
                <div class="section-title fl-wrap">
                    <h3>Reviews</h3>
                    <h2>Testimonials</h2>
                    <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna.
                        Etiam suscipit commodo gravida. </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <!--slider-carousel-wrap -->
            <div class="slider-carousel-wrap text-carousel-wrap fl-wrap">
                <div class="text-carousel-controls fl-wrap">
                    <div class="container">
                        <div class="sp-cont  sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                        <div class="sp-cont   sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
                    </div>
                </div>
                <div class="text-carousel cur_carousel-slider-container fl-wrap">
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="text-carousel-item">
                            <div class="popup-avatar"><img src="{{ asset('images/avatar/1.jpg') }}" alt="">
                            </div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                            <div class="review-owner fl-wrap">Milka Antony - <span>Happy Client</span></div>
                            <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu
                                mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer
                                adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                erat."</p>
                            <a href="#" class="testim-link">Via Facebook</a>
                        </div>
                    </div>
                    <!--slick-item end -->
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="text-carousel-item">
                            <div class="popup-avatar"><img src="{{ asset('images/avatar/1.jpg') }}" alt="">
                            </div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                            <div class="review-owner fl-wrap">Milka Antony - <span>Happy Client</span></div>
                            <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu
                                mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer
                                adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                erat."</p>
                            <a href="#" class="testim-link">Via Facebook</a>
                        </div>
                    </div>
                    <!--slick-item end -->
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="text-carousel-item">
                            <div class="popup-avatar"><img src="{{ asset('images/avatar/1.jpg') }}" alt="">
                            </div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                            <div class="review-owner fl-wrap">Milka Antony - <span>Happy Client</span></div>
                            <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu
                                mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer
                                adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                erat."</p>
                            <a href="#" class="testim-link">Via Facebook</a>
                        </div>
                    </div>
                    <!--slick-item end -->
                    <!--slick-item -->
                    <div class="slick-item">
                        <div class="text-carousel-item">
                            <div class="popup-avatar"><img src="{{ asset('images/avatar/1.jpg') }}" alt="">
                            </div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                            <div class="review-owner fl-wrap">Milka Antony - <span>Happy Client</span></div>
                            <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu
                                mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer
                                adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                erat."</p>
                            <a href="#" class="testim-link">Via Facebook</a>
                        </div>
                    </div>
                    <!--slick-item end -->
                </div>
            </div>
            <!--slider-carousel-wrap end-->
            <!-- client-list -->
            <div class="fl-wrap">
                <div class="container">
                    <ul class="client-list client-list-white">
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}"
                                    alt=""></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}"
                                    alt=""></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}"
                                    alt=""></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}"
                                    alt=""></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}"
                                    alt=""></a></li>
                    </ul>
                </div>
                <!-- client-list end-->
            </div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end -->
        <!-- section-->
        <section class="dark-bg2 small-padding order-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Ready To order Your Project ?</h3>
                    </div>
                    <div class="col-md-4"><a href="contacts.html" class="btn flat-btn color-btn">Get In Touch</a> </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
    <!-- Content end -->
@endsection
