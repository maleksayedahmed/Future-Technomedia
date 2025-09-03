@extends('layouts.user.app')
@section('css')
    <style>


        .project-showcase-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .project-hero-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 3rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .project-title-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .project-main-title {
            font-size: 3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .project-subtitle {
            font-size: 1.2rem;
            color: #7f8c8d;
            font-weight: 300;
        }

        .project-action-buttons {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .action-btn-primary,
        .action-btn-secondary {
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .action-btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .action-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
        }

        .action-btn-secondary {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .action-btn-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
        }

        .project-content-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-top: 2rem;
        }

        .project-media-gallery {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .media-gallery-title {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .project-image-showcase {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            border-radius: 15px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7f8c8d;
            font-size: 1.1rem;
            border: 2px dashed #bdc3c7;
            transition: all 0.3s ease;
        }

        .project-image-showcase:hover {
            transform: scale(1.02);
            border-color: #667eea;
        }

        .project-video-player {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #2c3e50, #3498db);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .project-video-player:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 30px rgba(52, 152, 219, 0.3);
        }

        .project-features-panel {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .features-panel-title {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .features-list-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .feature-item-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.5rem;
            border-radius: 15px;
            border-left: 4px solid #667eea;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .feature-item-card:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
        }

        .feature-title-text {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .feature-description-text {
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        .project-tech-stack {
            grid-column: 1 / -1;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .tech-stack-title {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .tech-badges-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
        }

        .tech-badge-item {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.8rem 1.2rem;
            border-radius: 25px;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .tech-badge-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        @media (max-width: 768px) {
            .project-content-wrapper {
                grid-template-columns: 1fr;
            }

            .project-action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .project-main-title {
                font-size: 2rem;
            }

            .tech-badges-grid {
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            }
        }

        .play-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .play-icon::after {
            content: '▶';
            font-size: 1.5rem;
            margin-left: 3px;
        }
    </style>
@endsection
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
                <li><a class="scroll-link act-link" href="#sec1">Project Hero</a></li>
                <li><a class="scroll-link" href="#sec2">Gallery</a></li>
                <li><a class="scroll-link" href="#sec3">Features</a></li>
                <li><a class="scroll-link" href="#sec4">Technology</a></li>
            </ul>
        </nav>
    </div>
    <!-- scroll-nav-wrap end-->

    <!-- Content-->
    <div class="content">
        <!-- section-->
        <section data-scrollax-parent="true" id="sec1">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">
                <span>//</span>Project Showcase
            </div>
            <div class="container">
                <div class="project-showcase-container">
                    <!-- Project Hero Section -->
                    <div class="project-hero-section" data-scrollax="properties: { translateY: '50px' }">
                        <div class="project-title-header">
                            <h1 class="project-main-title" data-scrollax="properties: { translateY: '-30px' }">E-Commerce Platform Pro</h1>
                            <p class="project-subtitle" data-scrollax="properties: { translateY: '20px' }">Advanced multi-vendor marketplace solution with AI-powered recommendations</p>
                        </div>

                        <div class="project-action-buttons" data-scrollax="properties: { translateY: '40px' }">
                            <a href="#" class="action-btn-primary" onclick="downloadBrochure()">
                                📄 Download Brochure
                            </a>
                            <a href="#" class="action-btn-secondary" onclick="requestDemo()">
                                🎯 Request Demo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="10" data-position-left="20" 
                data-scrollax="properties: { translateY: '-150px' }"></div>
            <div class="bg-parallax-module" data-position-top="30" data-position-left="80" 
                data-scrollax="properties: { translateY: '200px' }"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->

        <!-- section-->
        <section data-scrollax-parent="true" id="sec2">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">
                <span>//</span>Project Gallery
            </div>
            <div class="container">
                <!-- Media Gallery -->
                <div class="project-media-gallery" data-scrollax="properties: { translateY: '-60px' }">
                    <h2 class="media-gallery-title" data-scrollax="properties: { translateY: '-40px' }">Project Gallery</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="project-image-showcase" data-scrollax="properties: { translateY: '30px' }">
                                📱 Project Screenshot #1
                                <br><small>Dashboard Interface Preview</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="project-video-player" onclick="playVideo()" data-scrollax="properties: { translateY: '50px' }">
                                <div>
                                    <div class="play-icon"></div>
                                    🎬 Project Demo Video
                                    <br><small>Click to play demonstration</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="60" data-position-left="10" 
                data-scrollax="properties: { translateY: '-300px' }"></div>
            <div class="bg-parallax-module" data-position-top="85" data-position-left="70" 
                data-scrollax="properties: { translateY: '250px' }"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->

        <!-- section-->
        <section class="parallax-section dark-bg sec-half parallax-sec-half-left" data-scrollax-parent="true" id="sec3">
            <div class="bg par-elem" data-bg="{{ asset('images/bg/1.jpg') }}"
                data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title">
                    <h2>Key <span>Features</span> <br> & Capabilities</h2>
                    <p>Comprehensive solution with advanced features designed to enhance user experience and drive business growth.</p>
                    <div class="horizonral-subtitle"><span>Features</span></div>
                </div>
                <!-- Features Panel -->
                <div class="project-features-panel fl-wrap" data-scrollax="properties: { translateY: '90px' }">
                    <div class="features-list-container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item-card" data-scrollax="properties: { translateY: '20px' }">
                                    <div class="feature-title-text">Multi-Vendor Support</div>
                                    <div class="feature-description-text">Support for unlimited vendors with individual dashboards and analytics</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item-card" data-scrollax="properties: { translateY: '40px' }">
                                    <div class="feature-title-text">AI Recommendations</div>
                                    <div class="feature-description-text">Machine learning powered product recommendations for better user experience</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item-card" data-scrollax="properties: { translateY: '60px' }">
                                    <div class="feature-title-text">Real-time Analytics</div>
                                    <div class="feature-description-text">Comprehensive analytics dashboard with real-time sales tracking</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item-card" data-scrollax="properties: { translateY: '80px' }">
                                    <div class="feature-title-text">Mobile Responsive</div>
                                    <div class="feature-description-text">Fully responsive design optimized for all devices and screen sizes</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="feature-item-card" data-scrollax="properties: { translateY: '100px' }">
                                    <div class="feature-title-text">Payment Gateway</div>
                                    <div class="feature-description-text">Secure payment processing with multiple gateway integrations</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end-->

        <!-- section-->
        <section data-scrollax-parent="true" id="sec4">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">
                <span>//</span>Technology Stack
            </div>
            <div class="container">
                <!-- section-title -->
                <div class="section-title fl-wrap">
                    <h3>Built With Modern</h3>
                    <h2>Technology <span>Stack</span></h2>
                    <p>Leveraging cutting-edge technologies and frameworks to deliver robust, scalable, and maintainable solutions.</p>
                </div>
                <!-- section-title end -->
                
                <!-- Technology Stack -->
                <div class="project-tech-stack fl-wrap" data-scrollax="properties: { translateY: '120px' }">
                    <div class="tech-badges-grid" data-scrollax="properties: { translateY: '60px' }">
                        <div class="tech-badge-item">React.js</div>
                        <div class="tech-badge-item">Node.js</div>
                        <div class="tech-badge-item">MongoDB</div>
                        <div class="tech-badge-item">Express.js</div>
                        <div class="tech-badge-item">Redis</div>
                        <div class="tech-badge-item">AWS</div>
                        <div class="tech-badge-item">Docker</div>
                        <div class="tech-badge-item">GraphQL</div>
                    </div>
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
                        <h3>Ready To Start Your Project ?</h3>
                    </div>
                    <div class="col-md-4"><a href="#" class="btn flat-btn color-btn" onclick="requestDemo()">Get In Touch</a></div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
    <!-- Content end -->
@endsection
