@extends('layouts.user.app')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/project-show.css') }}">
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
        <section class="project-showcase-container">
            <!-- Hero Section with Smart Pricing -->
            <section class="project-hero-section">
                <div class="project-hero-content">
                    <div class="project-title-header">
                        <h1 class="project-main-title">{{ $project->title }}</h1>
                        <p class="project-subtitle">{{ $project->description }}</p>
                        @if ($project->hasFixedPrice())
                            <a href="#" class="action-btn-price" onclick="requestDemo()">
                                start from <span
                                    class="price-amount">${{ number_format($project->getDiscountedPrice(), 0) }}</span> per
                                projct
                            </a>
                        @endif

                    </div>

                    <div class="project-action-buttons">

                        @if (isset($brochureAvailable) && $brochureAvailable)
                            <a class="action-btn-primary" href="{{ route('projects.brochure.preview', $project) }}"
                                target="_blank">
                                📄 Product Manual
                            </a>
                        @endif


                    </div>
                </div>
                @if ($project->hasPricingPlans() && $project->pricingPlans->count() > 0)
                    <div class="pricing-grid">
                        @foreach ($project->pricingPlans as $plan)
                            <div class="pricing-card {{ $plan->is_popular ? 'popular' : '' }}">
                                <div class="pricing-header">
                                    <div class="pricing-title">{{ $plan->title }}</div>
                                    <div class="pricing-subtitle">{{ $plan->subtitle }}</div>
                                </div>
                                <div class="price-display">
                                    <span class="price-amount">${{ number_format($plan->price, 0) }}</span>
                                    <div class="price-period">one-time payment</div>
                                </div>
                                @if ($plan->features && count($plan->features) > 0)
                                    <ul class="pricing-features">
                                        @foreach ($plan->features as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <button class="cta-button" onclick="selectPackage('{{ $plan->title }}')">Choose
                                    {{ $plan->title }}</button>
                            </div>
                        @endforeach
                    </div>
                @endif

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
                        <!-- Video Section -->
                        @if (!empty($videoUrl) || !empty($videoEmbedUrl))
                            <div class="video-section">
                                <video controls src="{{ $videoUrl }}"></video>
                                {{-- <div class="play-overlay">
                                    <div class="play-button">▶️</div>
                                </div>
                                <span style="color: white; font-weight: 600;">Demo Video</span> --}}
                            </div>
                        @endif

                        <!-- Images Grid -->
                        <div class="thumbnail-grid" id="imagesGrid">
                            @if ($galleryImages->count() > 0)
                                @foreach ($galleryImages as $index => $image)
                                    <div class="image-block {{ $index == 0 ? 'wide' : '' }}"
                                        onclick="openLightbox({{ $index }})" data-fallback="📷">
                                        <img src="{{ $image->getUrl() }}"
                                            alt="{{ $project->title }} - Image {{ $index + 1 }}"
                                            onerror="this.style.display='none'">
                                    </div>
                                @endforeach
                            @else
                                <div class="image-block upload-placeholder">
                                    <span>📷</span>
                                    <span>No images available</span>
                                </div>
                            @endif
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

                    @if ($project->features->count() > 0)
                        <div class="feature-content active">
                            <div class="feature-grid">
                                @foreach ($project->features as $feature)
                                    <div class="feature-card">
                                        <div class="feature-header">
                                            <div class="feature-icon">
                                                @if (!empty($feature->icon))
                                                    <i class="fa-fw {{ $feature->icon }}"></i>
                                                @else
                                                    ✨
                                                @endif
                                            </div>
                                            <div class="feature-name">{{ $feature->title }}</div>
                                        </div>
                                        <div class="feature-description">{{ $feature->description }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="feature-content active">
                            <div class="feature-grid">
                                <div class="feature-card">
                                    <div class="feature-header">
                                        <div class="feature-icon">🚀</div>
                                        <div class="feature-name">Custom Development</div>
                                    </div>
                                    <div class="feature-description">Tailored solution built specifically for your business
                                        needs</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            <!-- Technology Stack -->
            <section class="tech-stack">
                <h2 class="tech-title">
                    Technology Stack
                </h2>


                @if ($project->techStacks->count() > 0)
                    <div class="tech-categories">
                        @foreach ($project->getTechStacksByCategory() as $category => $techStacks)
                            <div class="tech-category">
                                <div class="category-title">
                                    {{ $category }}
                                </div>
                                <div class="tech-grid">
                                    @foreach ($techStacks as $tech)
                                        <div class="tech-badge">{{ $tech->technology }}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="tech-categories">
                        <div class="tech-category">
                            <div class="category-title">
                                Technologies
                            </div>
                            <div class="tech-grid">
                                <div class="tech-badge">Custom Stack</div>
                            </div>
                        </div>
                    </div>
                @endif
            </section>
        </section>

    </div>
@endsection


@section('js')
    <script>
        // Smart Gallery Functions
        let currentImageIndex = 0;
        let images = [];
        let lightboxImages = [];

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

        function uploadImage(element) {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';

            input.onchange = function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        element.innerHTML =
                            `<img src="${event.target.result}" alt="Project Image" onclick="viewFullscreen('${event.target.result}')">`;
                        element.classList.remove('upload-placeholder');

                        // Add hover effect to view fullscreen
                        element.style.cursor = 'pointer';
                        element.addEventListener('mouseenter', function() {
                            this.style.transform = 'scale(1.05)';
                        });
                        element.addEventListener('mouseleave', function() {
                            this.style.transform = 'scale(1)';
                        });
                    };
                    reader.readAsDataURL(file);
                }
            };
            input.click();
        }

        window.openLightbox = function(startIndex) {
            if (!lightboxImages.length) return;

            let index = startIndex;
            const overlay = document.createElement('div');
            overlay.className = 'modal';
            overlay.style.cssText = `
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.9);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
            `;

            const img = document.createElement('img');
            img.style.cssText = `
                max-width: 90vw;
                max-height: 90vh;
                object-fit: contain;
                border-radius: 12px;
                box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
            `;

            const prev = document.createElement('button');
            prev.textContent = '‹';
            prev.style.cssText = `
                position: absolute; left: 20px; color: white; background: transparent; border: none; font-size: 3rem; cursor: pointer;
            `;
            const next = document.createElement('button');
            next.textContent = '›';
            next.style.cssText = `
                position: absolute; right: 20px; color: white; background: transparent; border: none; font-size: 3rem; cursor: pointer;
            `;
            const close = document.createElement('button');
            close.textContent = '×';
            close.style.cssText = `
                position: absolute; top: 10px; right: 20px; color: white; background: transparent; border: none; font-size: 2rem; cursor: pointer;
            `;

            function setImage(i) {
                const safeIndex = (i + lightboxImages.length) % lightboxImages.length;
                index = safeIndex;
                img.src = lightboxImages[safeIndex];
            }

            prev.onclick = (e) => {
                e.stopPropagation();
                setImage(index - 1);
            };
            next.onclick = (e) => {
                e.stopPropagation();
                setImage(index + 1);
            };
            close.onclick = (e) => {
                e.stopPropagation();
                document.body.removeChild(overlay);
            };
            overlay.onclick = (e) => {
                if (e.target === overlay) document.body.removeChild(overlay);
            };

            document.addEventListener('keydown', function onKey(e) {
                if (!document.body.contains(overlay)) {
                    document.removeEventListener('keydown', onKey);
                    return;
                }
                if (e.key === 'ArrowLeft') setImage(index - 1);
                if (e.key === 'ArrowRight') setImage(index + 1);
                if (e.key === 'Escape') document.body.removeChild(overlay);
            });

            overlay.appendChild(img);
            overlay.appendChild(prev);
            overlay.appendChild(next);
            overlay.appendChild(close);
            document.body.appendChild(overlay);
            setImage(index);
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
                        element.innerHTML =
                            `<img src="${event.target.result}" alt="Thumbnail" style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;">`;
                    };
                    reader.readAsDataURL(file);
                }
            };
            input.click();
        }

        function updateMainPreview() {
            const preview = document.getElementById('mainPreview');
            if (preview && images.length > 0) {
                preview.innerHTML = `<img src="${images[currentImageIndex]}" alt="Project Screenshot">`;
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

        window.playDemo = function() {
            @if (!empty($videoEmbedUrl))
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
                <iframe src="{{ $videoEmbedUrl }}" frameborder="0" allowfullscreen style="
                    max-width: 90vw;
                    width: 90vw;
                    height: 60vh;
                    border-radius: 12px;
                    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
                "></iframe>
            `;

                modal.onclick = (e) => {
                    if (e.target === modal) {
                        document.body.removeChild(modal);
                    }
                };
                document.body.appendChild(modal);
            @elseif ($videoUrl)
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
                <video controls autoplay style="
                    max-width: 90vw;
                    max-height: 90vh;
                    border-radius: 12px;
                    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
                ">
                    <source src="{{ $videoUrl }}" type="{{ $videoMime ?? 'video/mp4' }}">
                    Your browser does not support the video tag.
                </video>
            `;

                modal.onclick = (e) => {
                    if (e.target === modal) {
                        document.body.removeChild(modal);
                    }
                };
                document.body.appendChild(modal);
            @else
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
                    <h3 style="margin-bottom: 1rem; color: #1a1a1a;">Demo Video</h3>
                    <p style="color: #64748b; margin-bottom: 2rem;">No demo video available for this project</p>
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

                modal.onclick = () => document.body.removeChild(modal);
                document.body.appendChild(modal);
            @endif
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
            // Get package info dynamically
            @if ($project->hasPricingPlans())
                const packages = {
                    @foreach ($project->pricingPlans as $plan)
                        '{{ $plan->title }}': {
                            name: '{{ $plan->title }}',
                            price: '${{ number_format($plan->price, 0) }}',
                            subtitle: '{{ $plan->subtitle }}'
                        },
                    @endforeach
                };
            @else
                const packages = {
                    'fixed': {
                        name: 'Project Package',
                        price: '${{ number_format($project->getDiscountedPrice(), 0) }}',
                        subtitle: 'Complete solution'
                    }
                };
            @endif

            const package = packages[packageType] || packages['fixed'];

            const modal = document.createElement('div');
            modal.className = 'modal';
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
                        <p style="color: #64748b;">You selected: <strong>${package.name}</strong></p>
                        <p style="color: #64748b; font-size: 0.9rem;">${package.subtitle}</p>
                        <p style="color: #6366f1; font-size: 1.5rem; font-weight: 700; margin-top: 1rem;">${package.price}</p>
                    </div>

                    <form action="{{ route('projects.request-demo', $project) }}" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
                        @csrf
                        <input type="hidden" name="package" value="${packageType}">

                        <input type="text" name="name" placeholder="Your Name" required style="
                            padding: 1rem;
                            border: 2px solid #e2e8f0;
                            border-radius: 12px;
                            font-size: 1rem;
                        ">
                        <input type="email" name="email" placeholder="Your Email" required style="
                            padding: 1rem;
                            border: 2px solid #e2e8f0;
                            border-radius: 12px;
                            font-size: 1rem;
                        ">
                        <input type="tel" name="phone" placeholder="Phone Number" style="
                            padding: 1rem;
                            border: 2px solid #e2e8f0;
                            border-radius: 12px;
                            font-size: 1rem;
                        ">
                        <input type="text" name="company" placeholder="Company (Optional)" style="
                            padding: 1rem;
                            border: 2px solid #e2e8f0;
                            border-radius: 12px;
                            font-size: 1rem;
                        ">
                        <textarea name="message" placeholder="Project Requirements & Details" rows="3" style="
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
                            ">Send Demo Request</button>
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

            modal.onclick = () => document.body.removeChild(modal);
            document.body.appendChild(modal);


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
                card.style.transition = `opacity 0.8s ease ${index * 0.1}s, transform 0.8s ease ${index * 0.1}s`;
                observer.observe(card);
            });

            // Animate tech badges
            document.querySelectorAll('.tech-badge').forEach((badge, index) => {
                badge.style.opacity = '0';
                badge.style.transform = 'scale(0.8)';
                badge.style.transition = `opacity 0.6s ease ${index * 0.05}s, transform 0.6s ease ${index * 0.05}s`;
                observer.observe(badge);
            });

            // Animate pricing cards
            document.querySelectorAll('.pricing-card').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(40px)';
                card.style.transition = `opacity 0.8s ease ${index * 0.2}s, transform 0.8s ease ${index * 0.2}s`;
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

            // Build lightbox images array from rendered thumbnails
            lightboxImages = Array.from(document.querySelectorAll('#imagesGrid .image-block img'))
                .map(img => img.getAttribute('src'))
                .filter(Boolean);

            // Detect video orientation and toggle classes
            const videoEl = document.querySelector('.video-section video');
            if (videoEl) {
                const container = videoEl.closest('.video-section');

                function applyVideoOrientation() {
                    if (!container) return;
                    const isPortrait = videoEl.videoHeight > videoEl.videoWidth;
                    container.classList.toggle('video-portrait', isPortrait);
                    container.classList.toggle('video-landscape', !isPortrait);
                }

                if (videoEl.readyState >= 1) {
                    applyVideoOrientation();
                } else {
                    videoEl.addEventListener('loadedmetadata', applyVideoOrientation, {
                        once: true
                    });
                }

                window.addEventListener('resize', applyVideoOrientation);
            }
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
