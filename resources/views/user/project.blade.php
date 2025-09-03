@extends('layouts.user.app')
@section('css')
    <style>
        .project-showcase-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        section {
            padding: 10px 0;

        }

        /* Hero Section */
        .project-hero-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 32px;
            margin-bottom: 4rem;
            position: relative;
            overflow: hidden;
        }

        .project-hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
        }

        .project-main-title {
            font-size: 3.8rem;
            font-weight: 900;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
            text-align: center;
            background: #000;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .project-subtitle {
            font-size: 1.4rem;
            color: #64748b;
            text-align: center;
            max-width: 700px;
            margin: 0 auto 3rem;
            line-height: 1.6;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .pricing-card {
            background: #f1f1f1;
            border-radius: 24px;
            padding: 2.5rem;
            position: relative;
            border: 2px solid transparent;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .pricing-card::before {
            content: '';
            position: absolute;
            inset: 0;
            padding: 2px;
            background: linear-gradient(135deg, #F1C232, #9155E4, #F1C232);
            border-radius: inherit;
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .pricing-card:hover::before {
            opacity: 1;
        }

        .pricing-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(99, 102, 241, 0.2);
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .pricing-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .pricing-subtitle {
            color: #64748b;
            font-size: 0.9rem;
        }

        .price-display {
            text-align: center;
            margin: 2rem 0;
        }

        .price-amount {
            font-size: 3.5rem;
            font-weight: 900;
            color: #F1C232;
            display: block;
        }

        .price-period {
            color: #64748b;
            font-size: 1rem;
            margin-top: 0.5rem;
        }

        .pricing-features {
            list-style: none;
            margin: 2rem 0;
        }

        .pricing-features li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 0;
            color: #374151;
        }

        .pricing-features li::before {
            content: '✓';
            background: linear-gradient(135deg, #10b981, #10b981);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
            flex-shrink: 0;
        }

        .cta-button {
            width: 100%;
            background: linear-gradient(135deg, #F1C232, #F1C232);
            color: rgb(0, 0, 0);
            border: none;
            padding: 1rem 2rem;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .cta-button:hover {
            background: linear-gradient(135deg, #374151, #1a1a1a);
            transform: translateY(-2px);
        }

        /* Modern Content Grid */
        .project-content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1rem;
            margin: 0rem 0;
        }

        /* Smart Gallery Design */
        .smart-gallery {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 32px;
            padding: 3rem;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
            /* very light & soft shadow */
            border: 1px solid rgba(0, 0, 0, 0.05);
            /* optional light border */
            position: relative;
            overflow: hidden;
        }



        .gallery-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2.5rem;
        }

        .gallery-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #1a1a1a;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .gallery-controls {
            display: flex;
            gap: 0.5rem;
        }

        .control-btn {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: none;
            background: #f1f5f9;
            color: #64748b;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .control-btn:hover {
            background: #6366f1;
            color: white;
            transform: scale(1.05);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: 1fr 0fr;
            gap: 1.5rem;
            height: 670px;
        }

        .main-preview {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            border: 3px dashed #cbd5e1;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #64748b;
        }

        .main-preview:hover {
            border-color: #6366f1;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            transform: scale(1.02);
        }

        .main-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 17px;
        }

        .upload-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.7;
        }

        .upload-text {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .upload-subtext {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .thumbnail-grid {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .thumbnail {
            background: #f1f5f9;
            border-radius: 16px;
            height: calc(50% - 0.5rem);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            color: #64748b;
            font-size: 0.9rem;
            text-align: center;
        }

        .thumbnail:hover {
            background: #e2e8f0;
            transform: scale(1.05);
        }

        .thumbnail:first-child {
            background: linear-gradient(135deg, #1a1a1a, #374151);
            color: white;
        }

        .play-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .thumbnail:first-child .play-overlay {
            opacity: 1;
        }

        .play-button {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #1a1a1a;
        }

        /* Smart Features Panel */
        .smart-features {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 32px;
            padding: 3rem;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
            /* soft & subtle shadow */
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 0, 0, 0.05);
            /* light border */
        }


        .features-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .features-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .features-subtitle {
            color: #64748b;
            font-size: 1.1rem;
        }

        .tab-button {
            flex: 1;
            background: transparent;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            font-weight: 600;
            color: #64748b;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .tab-button.active {
            background: white;
            color: #1a1a1a;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .feature-content {
            display: none;
        }

        .feature-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-grid {
            display: grid;
            gap: 1.5rem;
        }

        .feature-card {
            background: linear-gradient(135deg, #ffffff, #f8fafc);
            border-radius: 20px;
            padding: 2rem;
            position: relative;
            border: 1px solid #e2e8f0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #6366f1, #8b5cf6);
            transform: scaleY(0);
            transition: transform 0.3s ease;
            transform-origin: bottom;
        }

        .feature-card:hover::before {
            transform: scaleY(1);
        }

        .feature-card:hover {
            transform: translateX(8px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.15);
            border-color: #c7d2fe;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: #F1C232;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .feature-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.75rem;
        }

        .feature-description {
            color: #64748b;
            line-height: 1.6;
            font-size: 0.95rem;
        }


        /* Technology Stack */
        .tech-stack {
            grid-column: 1 / -1;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 32px;
            padding: 3rem;
            margin-top: 4rem;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .tech-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .tech-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .tech-category {
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid #e2e8f0;
        }

        .category-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tech-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 1rem;
        }

        .tech-badge {
            background-color: rgba(241, 194, 50, 0.2);
            /* خلفية شفافه وهادية */
            color: #1a1a1a;
            /* النص أسود */
            padding: 0.75rem 1rem;
            border-radius: 12px;
            border: 2px solid #F1C232;
            /* حدود صفراء واضحة */
            text-align: center;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .tech-badge:hover {
            background-color: rgba(241, 194, 50, 0.3);
            /* شوية وضوح عند التحويم */
            color: #1a1a1a;
            transform: translateY(-2px);
        }

        .go-back {
            position: fixed;
            top: 0;
            left: 80px;
            font-size: 18px;
            color: #fff;
            width: 80px;
            text-align: center;
            z-index: 52;
            cursor: pointer;
            height: 80px;
            line-height: 80px;
            -webkit-transform: translate3d(0, 0, 0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .project-showcase-container {
                padding: 1rem;
            }

            .project-content-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .pricing-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                height: auto;
            }

            .thumbnail-grid {
                flex-direction: row;
                height: 100px;
            }

            .thumbnail {
                height: 100%;
                width: calc(50% - 0.5rem);
            }

            .tech-categories {
                grid-template-columns: 1fr;
            }

            .feature-tabs {
                flex-direction: column;
                gap: 0.5rem;
            }

            .tab-button {
                text-align: center;
            }
        }

        /* Enhanced Animations */
        .project-hero-section,
        .smart-gallery,
        .smart-features,
        .tech-stack {
            animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection
@section('content')
    <div class="scroll-nav-wrap">
        <div class="scroll-down-wrap">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
            <span>Scroll Down</span>
        </div>
    </div>

    <div class="content">
        <section class="project-showcase-container">
            <!-- Hero Section with Smart Pricing -->
            <section class="project-hero-section">
                <h1 class="project-main-title">E-Commerce Platform Pro</h1>
                <p class="project-subtitle">Advanced multi-vendor marketplace solution with AI-powered recommendations and
                    seamless user experience</p>

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
                        <button class="cta-button" onclick="selectPackage('starter')">Choose Starter</button>
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
                        <button class="cta-button" onclick="selectPackage('pro')">Choose Professional</button>
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
                        <button class="cta-button" onclick="selectPackage('enterprise')">Choose Enterprise</button>
                    </div>
                </div>

            </section>

            <!-- Smart Content Grid -->
            <section class="project-content-grid">
                <!-- Smart Gallery -->
                <div class="smart-gallery">
                    <div class="gallery-header">
                        <h2 class="gallery-title">
                            Smart Gallery
                        </h2>
                    </div>

                    <div class="gallery-grid">

                        <div class="thumbnail-grid">
                            <div class="thumbnail" onclick="playDemo()">
                                <div class="play-overlay">
                                    <div class="play-button">▶️</div>
                                </div>
                                <span>Demo Video</span>
                            </div>
                            {{-- <div class="thumbnail" onclick="uploadThumbnail(this)">
                                📸 Mobile View
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Smart Features Panel -->
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
            </section>

            <!-- Technology Stack -->
            <section class="tech-stack">
                <h2 class="tech-title">
                    Technology Stack
                </h2>

                <div class="tech-categories">
                    <div class="tech-category">
                        <div class="category-title">
                            🎨 Frontend
                        </div>
                        <div class="tech-grid">
                            <div class="tech-badge">React.js</div>
                            <div class="tech-badge">Next.js</div>
                            <div class="tech-badge">TypeScript</div>
                            <div class="tech-badge">Tailwind CSS</div>
                        </div>
                    </div>

                    <div class="tech-category">
                        <div class="category-title">
                            ⚙ Backend
                        </div>
                        <div class="tech-grid">
                            <div class="tech-badge">Node.js</div>
                            <div class="tech-badge">Express.js</div>
                            <div class="tech-badge">GraphQL</div>
                            <div class="tech-badge">REST API</div>
                        </div>
                    </div>

                    <div class="tech-category">
                        <div class="category-title">
                            🗄 Database
                        </div>
                        <div class="tech-grid">
                            <div class="tech-badge">MongoDB</div>
                            <div class="tech-badge">Redis</div>
                            <div class="tech-badge">PostgreSQL</div>
                            <div class="tech-badge">ElasticSearch</div>
                        </div>
                    </div>


                </div>
            </section>
        </section>

    </div>
@endsection


@section('js')
    <script>
        // Smart Gallery Functions
        let currentImageIndex = 0;
        let images = [];

        function uploadMainImage() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.multiple = true;

            input.onchange = function(e) {
                const files = Array.from(e.target.files);
                files.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        images.push(event.target.result);
                        updateMainPreview();
                    };
                    reader.readAsDataURL(file);
                });
            };
            input.click();
        }

        function uploadThumbnail(element) {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';

            input.onchange = function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        element.innerHTML = < img src = "${event.target.result}"
                        alt = "Thumbnail"
                        style = "width: 100%; height: 100%; object-fit: cover; border-radius: 12px;" > ;
                    };
                    reader.readAsDataURL(file);
                }
            };
            input.click();
        }

        function updateMainPreview() {
            const preview = document.getElementById('mainPreview');
            if (images.length > 0) {
                preview.innerHTML = < img src = "${images[currentImageIndex]}"
                alt = "Project Screenshot" > ;
            }
        }

        function previousImage() {
            if (images.length > 0) {
                currentImageIndex = currentImageIndex > 0 ? currentImageIndex - 1 : images.length - 1;
                updateMainPreview();
                animateTransition();
            }
        }

        function nextImage() {
            if (images.length > 0) {
                currentImageIndex = currentImageIndex < images.length - 1 ? currentImageIndex + 1 : 0;
                updateMainPreview();
                animateTransition();
            }
        }

        function fullscreen() {
            if (images.length > 0) {
                const img = new Image();
                img.src = images[currentImageIndex];
                img.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100vw;
                    height: 100vh;
                    object-fit: contain;
                    background: rgba(0,0,0,0.9);
                    z-index: 9999;
                    cursor: pointer;
                `;
                img.onclick = () => document.body.removeChild(img);
                document.body.appendChild(img);
            }
        }

        function animateTransition() {
            const preview = document.getElementById('mainPreview');
            preview.style.transform = 'scale(0.95)';
            preview.style.opacity = '0.8';
            setTimeout(() => {
                preview.style.transform = 'scale(1)';
                preview.style.opacity = '1';
            }, 200);
        }

        function playDemo() {
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0,0,0,0.9);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                cursor: pointer;
            `;

            modal.innerHTML = `
                <div style="
                    background: white;
                    border-radius: 20px;
                    padding: 3rem;
                    text-align: center;
                    max-width: 500px;
                    margin: 2rem;
                ">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">🎬</div>
                    <h3 style="margin-bottom: 1rem; color: #1a1a1a;">Demo Video Player</h3>
                    <p style="color: #64748b; margin-bottom: 2rem;">Video player would be embedded here with project demonstration</p>
                    <button onclick="document.body.removeChild(this.closest('div'))" style="
                        background: linear-gradient(135deg, #6366f1, #8b5cf6);
                        color: white;
                        border: none;
                        padding: 1rem 2rem;
                        border-radius: 12px;
                        font-weight: 600;
                        cursor: pointer;
                    ">Close</button>
                </div>
            `;

            modal.onclick = (e) => {
                if (e.target === modal) document.body.removeChild(modal);
            };

            document.body.appendChild(modal);
        }

        // Smart Features Tab System
        function switchTab(tabName) {
            // Update tab buttons
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            // Update content
            document.querySelectorAll('.feature-content').forEach(content => content.classList.remove('active'));
            document.getElementById(tabName + 'Tab').classList.add('active');
        }

        // Pricing Functions
        function selectPackage(packageType) {
            const button = event.target;
            const originalText = button.textContent;

            button.style.background = 'linear-gradient(135deg, #10b981, #059669)';
            button.textContent = '✓ Package Selected!';
            button.style.pointerEvents = 'none';

            setTimeout(() => {
                showContactForm(packageType);
                button.textContent = originalText;
                button.style.background = '';
                button.style.pointerEvents = 'auto';
            }, 2000);
        }

        function showContactForm(packageType) {
            const packages = {
                starter: {
                    name: 'Starter Package',
                    price: '$2,999'
                },
                pro: {
                    name: 'Professional Package',
                    price: '$4,999'
                },
                enterprise: {
                    name: 'Enterprise Package',
                    price: '$8,999'
                }
            };

            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0,0,0,0.8);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
                cursor: pointer;
            `;

            modal.innerHTML = `
                <div style="
                    background: white;
                    border-radius: 24px;
                    padding: 3rem;
                    max-width: 500px;
                    margin: 2rem;
                    cursor: default;
                " onclick="event.stopPropagation()">
                    <div style="text-align: center; margin-bottom: 2rem;">
                        <div style="font-size: 3rem; margin-bottom: 1rem;">🎉</div>
                        <h3 style="color: #1a1a1a; margin-bottom: 0.5rem;">Great Choice!</h3>
                        <p style="color: #64748b;">You selected: <strong>${packages[packageType].name}</strong></p>
                        <p style="color: #6366f1; font-size: 1.5rem; font-weight: 700; margin-top: 1rem;">${packages[packageType].price}</p>
                    </div>

                    <form style="display: flex; flex-direction: column; gap: 1rem;">
                        <input type="text" placeholder="Your Name" required style="
                            padding: 1rem;
                            border: 2px solid #e2e8f0;
                            border-radius: 12px;
                            font-size: 1rem;
                        ">
                        <input type="email" placeholder="Your Email" required style="
                            padding: 1rem;
                            border: 2px solid #e2e8f0;
                            border-radius: 12px;
                            font-size: 1rem;
                        ">
                        <input type="tel" placeholder="Phone Number" style="
                            padding: 1rem;
                            border: 2px solid #e2e8f0;
                            border-radius: 12px;
                            font-size: 1rem;
                        ">
                        <textarea placeholder="Project Requirements" rows="3" style="
                            padding: 1rem;
                            border: 2px solid #e2e8f0;
                            border-radius: 12px;
                            font-size: 1rem;
                            resize: vertical;
                        "></textarea>

                        <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                            <button type="submit" style="
                                flex: 1;
                                background: linear-gradient(135deg, #6366f1, #8b5cf6);
                                color: white;
                                border: none;
                                padding: 1rem;
                                border-radius: 12px;
                                font-weight: 600;
                                cursor: pointer;
                            ">Send Proposal Request</button>
                            <button type="button" onclick="document.body.removeChild(this.closest('.modal'))" style="
                                background: #f1f5f9;
                                color: #64748b;
                                border: none;
                                padding: 1rem;
                                border-radius: 12px;
                                cursor: pointer;
                            ">Cancel</button>
                        </div>
                    </form>
                </div>
            `;

            modal.className = 'modal';
            modal.onclick = (e) => {
                if (e.target === modal) document.body.removeChild(modal);
            };

            document.body.appendChild(modal);
        }

        // Enhanced scroll animations
        function animateOnScroll() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            // Animate feature cards
            document.querySelectorAll('.feature-card').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(40px)';
                card.style.transition = opacity 0.8 s ease $ {
                    index * 0.1
                }
                s, transform 0.8 s ease $ {
                    index * 0.1
                }
                s;
                observer.observe(card);
            });

            // Animate tech badges
            document.querySelectorAll('.tech-badge').forEach((badge, index) => {
                badge.style.opacity = '0';
                badge.style.transform = 'scale(0.8)';
                badge.style.transition = opacity 0.6 s ease $ {
                    index * 0.05
                }
                s, transform 0.6 s ease $ {
                    index * 0.05
                }
                s;
                observer.observe(badge);
            });

            // Animate pricing cards
            document.querySelectorAll('.pricing-card').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(40px)';
                card.style.transition = opacity 0.8 s ease $ {
                    index * 0.2
                }
                s, transform 0.8 s ease $ {
                    index * 0.2
                }
                s;
                observer.observe(card);
            });
        }

        // Initialize animations on load
        document.addEventListener('DOMContentLoaded', function() {
            animateOnScroll();

            // Add smooth hover effects
            document.querySelectorAll('.feature-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(8px) scale(1.02)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(8px) scale(1)';
                });
            });

            // Add pulse animation to CTA buttons
            const style = document.createElement('style');
            style.textContent = `
                @keyframes pulse {
                    0% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.4); }
                    70% { box-shadow: 0 0 0 10px rgba(99, 102, 241, 0); }
                    100% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0); }
                }

                .cta-button:hover {
                    animation: pulse 2s infinite;
                }

                .feature-card:hover {
                    animation: none;
                }
            `;
            document.head.appendChild(style);
        });

        // Add keyboard navigation for gallery
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') previousImage();
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'Escape') {
                const modals = document.querySelectorAll('.modal');
                modals.forEach(modal => document.body.removeChild(modal));
            }
        });

        // Smooth scroll for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
@endsection
