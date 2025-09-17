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
                    <!-- Video first if exists; otherwise use poster as first slide -->
                    @if (!empty($videoUrl))
                        <div class="show-case-item" data-curtext="{{ $project->title }}">
                            <div class="show-case-wrapper fl-wrap full-height"
                                style="height:70vh;width:940px;max-width:90vw;display:flex;align-items:center;justify-content:center;">
                                <div class="custom-video-player" data-autoinit>
                                    <video @if (!empty($videoPosterUrl)) poster="{{ $videoPosterUrl }}" @endif
                                        preload="metadata"
                                        style="width:100%;height:100%;object-fit:cover;border-radius:12px;display:block;"><!-- no native controls -->
                                        @if (!empty($videoMime))
                                            <source src="{{ $videoUrl }}" type="{{ $videoMime }}">
                                        @else
                                            <source src="{{ $videoUrl }}">
                                        @endif
                                        Your browser does not support the video tag.
                                    </video>
                                    <button class="cvp-big-play" type="button" aria-label="Play">
                                        ▶
                                    </button>
                                    <div class="cvp-controls">
                                        <button class="cvp-btn cvp-play" type="button" aria-label="Play/Pause">▶</button>
                                        <div class="cvp-time"><span class="cvp-time-current">0:00</span> / <span
                                                class="cvp-time-duration">0:00</span></div>
                                        <div class="cvp-progress" role="slider" aria-label="Seek">
                                            <div class="cvp-progress-filled"></div>
                                        </div>
                                        <button class="cvp-btn cvp-mute" type="button" aria-label="Mute/Unmute">🔊</button>
                                        <input class="cvp-volume" type="range" min="0" max="1"
                                            step="0.01" value="1" aria-label="Volume">
                                        <button class="cvp-btn cvp-fullscreen" type="button"
                                            aria-label="Fullscreen">⤢</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif (!empty($videoPosterUrl))
                        <div class="show-case-item" data-curtext="{{ $project->title }}">
                            <div class="show-case-wrapper fl-wrap full-height"
                                style="height:70vh;width:940px;max-width:90vw;display:flex;align-items:center;justify-content:center;">
                                <img src="{{ $videoPosterUrl }}" alt="{{ $project->title }} poster"
                                    style="width:100%;height:100%;object-fit:cover;border-radius:12px;display:block;">
                                <div class="show-info">
                                    <span>Info</span>
                                    <div class="tooltip-info">
                                        <h5>{{ $project->title }}</h5>
                                        <p>{{ Str::limit($project->description, 120) }}</p>
                                    </div>
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
                                            <a class="action-btn-primary"
                                                href="{{ route('projects.brochure.preview', $project) }}"
                                                target="_blank">📄 Product Manual</a>
                                        @endif
                                        <a href="#" class="action-btn-secondary" onclick="requestDemo()">🎯 Offer
                                            Request</a>
                                    </div>
                                </div>

                                <div class="ci-num"><span>01.</span></div>
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
                                                    <span
                                                        class="price-amount">${{ number_format($plan->price, 0) }}</span>
                                                    <div class="price-period">one-time payment</div>
                                                </div>
                                                @if ($plan->features && count($plan->features) > 0)
                                                    <ul class="pricing-features">
                                                        @foreach ($plan->features as $f)
                                                            <li>{{ $f }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                <button class="cta-button"
                                                    onclick="selectPackage('{{ $plan->title }}')">Choose
                                                    {{ $plan->title }}</button>
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
                    <div class="col-md-4"><a href="{{ route('contact') }}" class="btn flat-btn color-btn">Get In
                            Touch</a> </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
@endsection

@section('js')
    <script>
        // Minimal custom video player wiring for elements with [data-autoinit]
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.custom-video-player[data-autoinit]').forEach(function(root) {
                const video = root.querySelector('video');
                const btnBig = root.querySelector('.cvp-big-play');
                const btnPlay = root.querySelector('.cvp-play');
                const btnMute = root.querySelector('.cvp-mute');
                const btnFs = root.querySelector('.cvp-fullscreen');
                const vol = root.querySelector('.cvp-volume');
                const progress = root.querySelector('.cvp-progress');
                const progressFill = root.querySelector('.cvp-progress-filled');
                const timeCur = root.querySelector('.cvp-time-current');
                const timeDur = root.querySelector('.cvp-time-duration');

                function fmt(s) {
                    if (isNaN(s)) return '0:00';
                    const m = Math.floor(s / 60);
                    const ss = Math.floor(s % 60).toString().padStart(2, '0');
                    return `${m}:${ss}`;
                }

                function togglePlay() {
                    if (video.paused) video.play();
                    else video.pause();
                }

                btnBig && btnBig.addEventListener('click', togglePlay);
                btnPlay && btnPlay.addEventListener('click', togglePlay);
                btnMute && btnMute.addEventListener('click', function() {
                    video.muted = !video.muted;
                    render();
                });
                vol && vol.addEventListener('input', function() {
                    video.volume = parseFloat(this.value);
                    video.muted = (video.volume === 0);
                    render();
                });
                progress && progress.addEventListener('click', function(e) {
                    const rect = progress.getBoundingClientRect();
                    const p = (e.clientX - rect.left) / rect.width;
                    video.currentTime = p * (video.duration || 0);
                });
                btnFs && btnFs.addEventListener('click', function() {
                    if (document.fullscreenElement) {
                        document.exitFullscreen();
                    } else {
                        root.requestFullscreen().catch(() => {});
                    }
                });

                video.addEventListener('play', render);
                video.addEventListener('pause', render);
                video.addEventListener('timeupdate', render);
                video.addEventListener('loadedmetadata', render);

                function render() {
                    if (btnBig) btnBig.style.display = video.paused ? 'grid' : 'none';
                    if (btnPlay) btnPlay.textContent = video.paused ? '▶' : '❚❚';
                    if (btnMute) btnMute.textContent = video.muted || video.volume === 0 ? '🔈' : '🔊';
                    if (timeCur) timeCur.textContent = fmt(video.currentTime || 0);
                    if (timeDur) timeDur.textContent = fmt(video.duration || 0);
                    if (progressFill) {
                        const p = (video.currentTime || 0) / (video.duration || 1);
                        progressFill.style.width = `${Math.max(0, Math.min(1, p)) * 100}%`;
                    }
                    if (vol && document.activeElement !== vol) {
                        vol.value = (video.muted ? 0 : (video.volume || 1));
                    }

                    // Add/remove playing class for CSS styling and prevent poster from reappearing
                    if (video.paused) {
                        root.classList.remove('playing');
                    } else {
                        root.classList.add('playing');
                        // Remove poster attribute once video starts playing to prevent it from showing again
                        if (video.poster && video.currentTime > 0) {
                            video.removeAttribute('poster');
                        }
                    }
                }
                render();
            });
        });

        function selectPackage(packageType) {
            const btn = event.target;
            const t = btn.textContent;
            btn.textContent = '✓ Package Selected!';
            btn.style.pointerEvents = 'none';
            setTimeout(() => {
                showContactForm(packageType);
                btn.textContent = t;
                btn.style.pointerEvents = 'auto';
            }, 1000);
        }

        function showContactForm(packageType) {
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
                        price: '{{ $project->hasFixedPrice() ? '$' . number_format($project->getDiscountedPrice(), 0) : '' }}',
                        subtitle: 'Complete solution'
                    }
                };
            @endif
            const pkg = packages[packageType] || packages['fixed'] || {
                name: 'Custom Package',
                price: '',
                subtitle: ''
            };
            const modal = document.createElement('div');
            modal.className = 'modal';
            modal.style.cssText =
                'position:fixed;inset:0;background:rgba(0,0,0,.8);display:flex;align-items:center;justify-content:center;z-index:9999;cursor:pointer;';
            modal.innerHTML = `
                <div style="background:#fff;border-radius:24px;padding:3rem;max-width:500px;margin:2rem;cursor:default;" onclick="event.stopPropagation()">
                    <div style="text-align:center;margin-bottom:2rem;">
                        <div style="font-size:3rem;margin-bottom:1rem;">🎉</div>
                        <h3 style="color:#1a1a1a;margin-bottom:.5rem;">Great Choice!</h3>
                        <p style="color:#64748b;">You selected: <strong>${pkg.name}</strong></p>
                        <p style="color:#64748b;font-size:.9rem;">${pkg.subtitle}</p>
                        <p style="color:#6366f1;font-size:1.5rem;font-weight:700;margin-top:1rem;">${pkg.price}</p>
                    </div>
                    <form action="{{ route('projects.request-demo', $project) }}" method="POST" style="display:flex;flex-direction:column;gap:1rem;">
                        @csrf
                        <input type="hidden" name="package" value="${packageType || 'custom'}">
                        <input type="text" name="name" placeholder="Your Name" required style="padding:1rem;border:2px solid #e2e8f0;border-radius:12px;font-size:1rem;">
                        <input type="email" name="email" placeholder="Your Email" required style="padding:1rem;border:2px solid #e2e8f0;border-radius:12px;font-size:1rem;">
                        <input type="tel" name="phone" placeholder="Phone Number" style="padding:1rem;border:2px solid #e2e8f0;border-radius:12px;font-size:1rem;">
                        <input type="text" name="company" placeholder="Company (Optional)" style="padding:1rem;border:2px solid #e2e8f0;border-radius:12px;font-size:1rem;">
                        <textarea name="message" placeholder="Project Requirements & Details" rows="3" style="padding:1rem;border:2px solid #e2e8f0;border-radius:12px;font-size:1rem;resize:vertical;"></textarea>
                        <div style="display:flex;gap:1rem;margin-top:1rem;">
                            <button type="submit" style="flex:1;background:linear-gradient(135deg,#6366f1,#8b5cf6);color:#fff;border:none;padding:1rem;border-radius:12px;font-weight:600;cursor:pointer;">Send Request</button>
                            <button type="button" onclick="document.body.removeChild(this.closest('.modal'))" style="background:#f1f5f9;color:#64748b;border:none;padding:1rem;border-radius:12px;cursor:pointer;">Cancel</button>
                        </div>
                    </form>
                </div>`;
            modal.onclick = () => document.body.removeChild(modal);
            document.body.appendChild(modal);
        }

        function requestDemo() {
            const type =
                '{{ $project->hasPricingPlans() ? $project->pricingPlans->first()->title ?? 'custom' : ($project->hasFixedPrice() ? 'fixed' : 'custom') }}';
            showContactForm(type);
        }
    </script>
@endsection
