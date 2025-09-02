@extends('layouts.user.app')

@section('css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

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
    <div class="content">
        <div class="project-showcase-container">
            <!-- Project Hero Section -->
            <div class="project-hero-section">
                <div class="project-title-header">
                    <h1 class="project-main-title">E-Commerce Platform Pro</h1>
                    <p class="project-subtitle">Advanced multi-vendor marketplace solution with AI-powered recommendations
                    </p>
                </div>

                <div class="project-action-buttons">
                    <a href="#" class="action-btn-primary" onclick="downloadBrochure()">
                        📄 Download Brochure
                    </a>
                    <a href="#" class="action-btn-secondary" onclick="requestDemo()">
                        🎯 Request Demo
                    </a>
                </div>
            </div>

            <!-- Project Content -->
            <div class="project-content-wrapper">
                <!-- Media Gallery -->
                <div class="project-media-gallery">
                    <h2 class="media-gallery-title">Project Gallery</h2>

                    <div class="project-image-showcase">
                        📱 Project Screenshot #1
                        <br><small>Dashboard Interface Preview</small>
                    </div>

                    <div class="project-video-player" onclick="playVideo()">
                        <div>
                            <div class="play-icon"></div>
                            🎬 Project Demo Video
                            <br><small>Click to play demonstration</small>
                        </div>
                    </div>
                </div>

                <!-- Features Panel -->
                <div class="project-features-panel">
                    <h2 class="features-panel-title">Key Features</h2>

                    <div class="features-list-container">
                        <div class="feature-item-card">
                            <div class="feature-title-text">Multi-Vendor Support</div>
                            <div class="feature-description-text">Support for unlimited vendors with individual dashboards
                                and
                                analytics</div>
                        </div>

                        <div class="feature-item-card">
                            <div class="feature-title-text">AI Recommendations</div>
                            <div class="feature-description-text">Machine learning powered product recommendations for
                                better
                                user experience</div>
                        </div>

                        <div class="feature-item-card">
                            <div class="feature-title-text">Real-time Analytics</div>
                            <div class="feature-description-text">Comprehensive analytics dashboard with real-time sales
                                tracking</div>
                        </div>

                        <div class="feature-item-card">
                            <div class="feature-title-text">Mobile Responsive</div>
                            <div class="feature-description-text">Fully responsive design optimized for all devices and
                                screen
                                sizes</div>
                        </div>

                        <div class="feature-item-card">
                            <div class="feature-title-text">Payment Gateway</div>
                            <div class="feature-description-text">Secure payment processing with multiple gateway
                                integrations
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technology Stack -->
            <div class="project-tech-stack">
                <h2 class="tech-stack-title">Technology Stack</h2>
                <div class="tech-badges-grid">
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
    </div>
@endsection

@section('js')
    <script>
        function downloadBrochure() {
            // Simulate brochure download
            alert('Brochure download will start shortly...');
            console.log('Downloading project brochure...');
        }

        function requestDemo() {
            // Simulate demo request
            alert('Demo request submitted! Our team will contact you soon.');
            console.log('Demo request submitted for E-Commerce Platform Pro');
        }

        function playVideo() {
            // Simulate video play
            alert('Video player would open here with project demonstration');
            console.log('Playing project demo video...');
        }

        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate feature cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all feature cards
            const featureCards = document.querySelectorAll('.feature-item-card');
            featureCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition =
                    `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });

            // Animate tech badges
            const techBadges = document.querySelectorAll('.tech-badge-item');
            techBadges.forEach((badge, index) => {
                badge.style.opacity = '0';
                badge.style.transform = 'scale(0.8)';
                badge.style.transition =
                    `opacity 0.4s ease ${index * 0.05}s, transform 0.4s ease ${index * 0.05}s`;
                observer.observe(badge);
            });
        });
    </script>
@endsection
