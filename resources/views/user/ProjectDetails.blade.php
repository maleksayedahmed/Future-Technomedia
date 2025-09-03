@extends('layouts.user.app')

@section('css')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #1a1a1a;
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        min-height: 100vh;
    }

    .project-showcase-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
    }

    .project-hero-section {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 24px;
        padding: 4rem 3rem;
        margin-bottom: 3rem;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
    }

    .project-hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #FFD700, #FFA500);
    }

    .project-title-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .project-main-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: #1a1a1a;
        margin-bottom: 1rem;
        position: relative;
    }

    .project-subtitle {
        font-size: 1.3rem;
        color: #666666;
        font-weight: 400;
        max-width: 600px;
        margin: 0 auto 2rem;
        line-height: 1.5;
    }

    .project-pricing-display {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
        margin: 2rem auto;
        padding: 1.5rem 3rem;
        background: linear-gradient(135deg, #FFD700, #FFA500);
        border-radius: 60px;
        max-width: 450px;
        box-shadow: 0 15px 35px rgba(255, 215, 0, 0.3);
        transition: all 0.3s ease;
    }

    .project-pricing-display:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 45px rgba(255, 215, 0, 0.4);
    }

    .price-label {
        color: #1a1a1a;
        font-size: 1rem;
        font-weight: 600;
    }

    .price-amount {
        font-size: 2.8rem;
        font-weight: 900;
        color: #1a1a1a;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .price-period {
        color: #1a1a1a;
        font-size: 1rem;
        font-weight: 600;
    }

    .project-action-buttons {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin-top: 2.5rem;
    }

    .action-btn-primary,
    .action-btn-secondary {
        padding: 1.2rem 3rem;
        border: none;
        border-radius: 60px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
        min-width: 200px;
        justify-content: center;
    }

    .action-btn-primary {
        background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
        color: #FFD700;
        box-shadow: 0 12px 35px rgba(26, 26, 26, 0.4);
        border: 2px solid transparent;
    }

    .action-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 45px rgba(26, 26, 26, 0.5);
        background: linear-gradient(135deg, #2d2d2d, #1a1a1a);
    }

    .action-btn-secondary {
        background: transparent;
        color: #1a1a1a;
        border: 2px solid #1a1a1a;
    }

    .action-btn-secondary:hover {
        background: #1a1a1a;
        color: #FFD700;
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(26, 26, 26, 0.3);
    }

    .project-content-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-top: 3rem;
    }

    .project-media-gallery {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 24px;
        padding: 3rem;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .media-gallery-title {
        font-size: 2rem;
        color: #1a1a1a;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: 700;
    }

    .project-image-showcase {
        width: 100%;
        height: 280px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 20px;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666666;
        font-size: 1.1rem;
        border: 3px dashed #FFD700;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .project-image-showcase:hover {
        transform: scale(1.02);
        border-color: #FFA500;
        box-shadow: 0 15px 35px rgba(255, 215, 0, 0.2);
    }

    .project-image-showcase img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 17px;
    }

    .image-placeholder {
        text-align: center;
        color: #999999;
    }

    .image-upload-area {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #FFD700;
        color: #1a1a1a;
        padding: 0.5rem;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .image-upload-area:hover {
        background: #FFA500;
        transform: scale(1.1);
    }

    .project-video-player {
        width: 100%;
        height: 220px;
        background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFD700;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .project-video-player:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 40px rgba(255, 215, 0, 0.3);
    }

    .project-features-panel {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 24px;
        padding: 3rem;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .features-panel-title {
        font-size: 2rem;
        color: #1a1a1a;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: 700;
    }

    .features-list-container {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .feature-item-card {
        background: linear-gradient(135deg, #f8f9fa, #ffffff);
        padding: 2rem;
        border-radius: 20px;
        border-left: 5px solid #FFD700;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .feature-item-card:hover {
        transform: translateX(15px);
        box-shadow: 0 15px 35px rgba(255, 215, 0, 0.2);
        border-left-color: #FFA500;
    }

    .feature-title-text {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.8rem;
    }

    .feature-description-text {
        color: #666666;
        font-size: 1rem;
        line-height: 1.6;
    }

    .project-tech-stack {
        grid-column: 1 / -1;
        background: rgba(255, 255, 255, 0.98);
        border-radius: 24px;
        padding: 3rem;
        margin-top: 3rem;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .tech-stack-title {
        font-size: 2rem;
        color: #1a1a1a;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: 700;
    }

    .tech-badges-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 1.5rem;
    }

    .tech-badge-item {
        background: linear-gradient(135deg, #FFD700, #FFA500);
        color: #1a1a1a;
        padding: 1rem 1.5rem;
        border-radius: 30px;
        text-align: center;
        font-weight: 700;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 8px 25px rgba(255, 215, 0, 0.3);
    }

    .tech-badge-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(255, 215, 0, 0.4);
        background: linear-gradient(135deg, #FFA500, #FFD700);
    }

    .play-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #FFD700, #FFA500);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: #1a1a1a;
        font-size: 2rem;
        transition: all 0.3s ease;
    }

    .play-icon:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 30px rgba(255, 215, 0, 0.4);
    }

    .play-icon::after {
        content: '▶';
        margin-left: 4px;
    }

    @media (max-width: 768px) {
        .project-showcase-container {
            padding: 1rem;
        }

        .project-hero-section {
            padding: 3rem 2rem;
            margin-bottom: 2rem;
        }

        .project-content-wrapper {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .project-action-buttons {
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .project-main-title {
            font-size: 2.5rem;
        }

        .price-amount {
            font-size: 2.2rem;
        }

        .project-pricing-display {
            flex-direction: column;
            gap: 0.3rem;
            padding: 1.2rem 2rem;
            max-width: 300px;
        }

        .tech-badges-grid {
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
        }

        .action-btn-primary,
        .action-btn-secondary {
            width: 100%;
            max-width: 280px;
        }

        .project-media-gallery,
        .project-features-panel,
        .project-tech-stack {
            padding: 2rem;
        }
    }

    /* Additional smooth animations */
    .project-hero-section,
    .project-media-gallery,
    .project-features-panel,
    .project-tech-stack {
        animation: fadeInUp 0.8s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .content {
        background: transparent;
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
                <p class="project-subtitle">Advanced multi-vendor marketplace solution with AI-powered recommendations and seamless user experience</p>
                
                <div class="project-pricing-display">
                    <span class="price-label">Starting from</span>
                    <span class="price-amount">$4,999</span>
                    <span class="price-period">per project</span>
                </div>
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

                <div class="project-image-showcase" onclick="uploadImage(this)">
                    <div class="image-placeholder">
                        📱 Click to upload project screenshot
                        <br><small>Dashboard Interface Preview</small>
                    </div>
                    <div class="image-upload-area" title="Upload Image">📷</div>
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
                        <div class="feature-description-text">Support for unlimited vendors with individual dashboards, analytics, and commission management systems</div>
                    </div>

                    <div class="feature-item-card">
                        <div class="feature-title-text">AI Recommendations</div>
                        <div class="feature-description-text">Machine learning powered product recommendations for enhanced user experience and increased sales conversion</div>
                    </div>

                    <div class="feature-item-card">
                        <div class="feature-title-text">Real-time Analytics</div>
                        <div class="feature-description-text">Comprehensive analytics dashboard with real-time sales tracking, inventory management, and performance metrics</div>
                    </div>

                    <div class="feature-item-card">
                        <div class="feature-title-text">Mobile Responsive</div>
                        <div class="feature-description-text">Fully responsive design optimized for all devices and screen sizes with progressive web app capabilities</div>
                    </div>

                    <div class="feature-item-card">
                        <div class="feature-title-text">Payment Gateway</div>
                        <div class="feature-description-text">Secure payment processing with multiple gateway integrations including PayPal, Stripe, and local payment methods</div>
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
                <div class="tech-badge-item">Next.js</div>
                <div class="tech-badge-item">TypeScript</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function downloadBrochure() {
        // Simulate brochure download with better UX
        const button = event.target;
        const originalText = button.innerHTML;
        button.innerHTML = '⏳ Preparing download...';
        button.style.pointerEvents = 'none';
        
        setTimeout(() => {
            button.innerHTML = '✅ Download Ready!';
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.pointerEvents = 'auto';
                // Here you would trigger actual download
                console.log('Downloading project brochure...');
            }, 1500);
        }, 2000);
    }

    function requestDemo() {
        // Simulate demo request with better UX
        const button = event.target;
        const originalText = button.innerHTML;
        button.innerHTML = '⏳ Submitting request...';
        button.style.pointerEvents = 'none';
        
        setTimeout(() => {
            button.innerHTML = '✅ Request Sent!';
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.pointerEvents = 'auto';
                alert('Demo request submitted successfully! Our team will contact you within 24 hours.');
                console.log('Demo request submitted for E-Commerce Platform Pro');
            }, 1500);
        }, 2000);
    }

    function playVideo() {
        // Simulate video play with better UX
        const videoPlayer = event.currentTarget;
        videoPlayer.innerHTML = `
            <div>
                <div class="play-icon" style="animation: spin 2s linear infinite;">⏳</div>
                🎬 Loading video...
                <br><small>Please wait</small>
            </div>
        `;
        
        setTimeout(() => {
            alert('Video player would open here with project demonstration');
            videoPlayer.innerHTML = `
                <div>
                    <div class="play-icon"></div>
                    🎬 Project Demo Video
                    <br><small>Click to play demonstration</small>
                </div>
            `;
            console.log('Playing project demo video...');
        }, 2000);
    }

    function uploadImage(element) {
        // Simulate image upload
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    element.innerHTML = `<img src="${event.target.result}" alt="Project Screenshot">`;
                    element.style.border = '3px solid #FFD700';
                };
                reader.readAsDataURL(file);
            }
        };
        input.click();
    }

    // Enhanced animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animate feature cards on scroll with stagger effect
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

        // Observe all feature cards with staggered animation
        const featureCards = document.querySelectorAll('.feature-item-card');
        featureCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(40px)';
            card.style.transition = `opacity 0.8s ease ${index * 0.15}s, transform 0.8s ease ${index * 0.15}s`;
            observer.observe(card);
        });

        // Animate tech badges with scale effect
        const techBadges = document.querySelectorAll('.tech-badge-item');
        techBadges.forEach((badge, index) => {
            badge.style.opacity = '0';
            badge.style.transform = 'scale(0.8)';
            badge.style.transition = `opacity 0.6s ease ${index * 0.08}s, transform 0.6s ease ${index * 0.08}s`;
            observer.observe(badge);
        });

        // Add smooth hover effects for buttons
        const buttons = document.querySelectorAll('.action-btn-primary, .action-btn-secondary');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px) scale(1.02)';
            });
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    });

    // Add CSS for spin animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection