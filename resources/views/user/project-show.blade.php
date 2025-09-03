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
            margin-bottom: .5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .project-subtitle {
            font-size: 1.1rem;
            color: #7f8c8d;
            font-weight: 300;
        }

        .project-action-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .action-btn-primary,
        .action-btn-secondary {
            padding: .9rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: .5rem;
        }

        .action-btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            box-shadow: 0 10px 30px rgba(102, 126, 234, .4);
        }

        .action-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, .6);
        }

        .action-btn-secondary {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .action-btn-secondary:hover {
            background: #667eea;
            color: #fff;
            transform: translateY(-3px);
        }

        .project-content-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-top: 2rem;
        }

        .project-media-gallery,
        .project-features-panel {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .media-gallery-title,
        .features-panel-title {
            font-size: 1.6rem;
            color: #2c3e50;
            margin-bottom: 1.2rem;
            text-align: center;
        }

        .project-image-showcase {
            width: 100%;
            height: 250px;
            background: #f5f7fa;
            border-radius: 15px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7f8c8d;
            font-size: 1.05rem;
            border: 2px dashed #bdc3c7;
            transition: all .3s ease;
            overflow: hidden;
        }

        .project-image-showcase img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .project-image-showcase:hover {
            transform: scale(1.02);
            border-color: #667eea;
        }

        .project-video-player {
            width: 100%;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(52, 152, 219, .25);
        }

        .feature-item-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.2rem;
            border-radius: 15px;
            border-left: 4px solid #667eea;
            transition: all .3s ease;
            margin-bottom: .8rem;
        }

        .feature-item-card:hover {
            transform: translateX(6px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, .2);
        }

        .feature-title-text {
            font-size: 1.08rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: .35rem;
        }

        .feature-description-text {
            color: #7f8c8d;
            font-size: .95rem;
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
            font-size: 1.6rem;
            color: #2c3e50;
            margin-bottom: 1.2rem;
            text-align: center;
        }

        .tech-badges-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
        }

        .tech-badge-item {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            padding: .7rem 1rem;
            border-radius: 25px;
            text-align: center;
            font-weight: 600;
            transition: all .3s ease;
        }

        .tech-badge-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, .4);
        }

        @media (max-width: 768px) {
            .project-content-wrapper {
                grid-template-columns: 1fr;
            }

            .project-main-title {
                font-size: 2rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <section data-scrollax-parent="true">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">
                <span>//</span>{{ $project->category ?: 'Project' }}
            </div>
            <div class="container">
                <div class="project-showcase-container">
                    <div class="project-hero-section" data-scrollax="properties: { translateY: '50px' }">
                        <div class="project-title-header">
                            <h1 class="project-main-title" data-scrollax="properties: { translateY: '-30px' }">
                                {{ $project->title }}</h1>
                            @if ($project->description)
                                <p class="project-subtitle" data-scrollax="properties: { translateY: '20px' }">
                                    {{ $project->description }}</p>
                            @endif
                        </div>
                        <div class="project-action-buttons" data-scrollax="properties: { translateY: '40px' }">
                            @if ($brochureAvailable)
                                <a href="{{ route('projects.brochure', $project) }}" class="action-btn-primary">
                                    📄 {{ __('Download Brochure') }}
                                </a>
                            @endif
                            <a href="#demo-form" class="action-btn-secondary">
                                🎯 {{ __('Request Demo') }}
                            </a>
                            @if ($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" rel="noopener"
                                    class="action-btn-secondary">🔗 {{ __('Visit Project') }}</a>
                            @endif
                        </div>
                    </div>

                    <div class="project-content-wrapper">
                        <div class="project-media-gallery" data-scrollax="properties: { translateY: '-60px' }">
                            <h2 class="media-gallery-title">{{ __('Project Gallery') }}</h2>
                            @if (count($galleryImages))
                                @foreach ($galleryImages as $media)
                                    <a href="{{ $media->getUrl() }}" class="project-image-showcase image-popup">
                                        <img src="{{ $media->getUrl() }}" alt="{{ $project->title }}" />
                                    </a>
                                @endforeach
                            @else
                                <div class="project-image-showcase">{{ __('No images available') }}</div>
                            @endif

                            <div class="project-video-player" style="margin-top:1rem;">
                                <video src="{{ $videoUrl }}" controls
                                    style="width:100%; height: auto; display:block;"></video>
                            </div>
                        </div>

                        <div class="project-features-panel">
                            <h2 class="features-panel-title">{{ __('Key Features') }}</h2>
                            @if ($derivedFeatures->count())
                                @foreach ($derivedFeatures as $featureLine)
                                    <div class="feature-item-card">
                                        <div class="feature-title-text">{{ $featureLine }}</div>
                                    </div>
                                @endforeach
                            @else
                                <div class="feature-item-card">
                                    <div class="feature-title-text">{{ __('High performance and scalability') }}</div>
                                </div>
                                <div class="feature-item-card">
                                    <div class="feature-title-text">{{ __('Modern responsive design') }}</div>
                                </div>
                                <div class="feature-item-card">
                                    <div class="feature-title-text">{{ __('Secure and reliable') }}</div>
                                </div>
                            @endif
                        </div>

                        <div class="project-tech-stack">
                            <h2 class="tech-stack-title">{{ __('Request a Demo') }}</h2>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert" style="margin-bottom:1rem;">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form id="demo-form" action="{{ route('projects.request-demo', $project) }}" method="post"
                                class="fl-wrap">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" placeholder="{{ __('Your Name') }}"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" placeholder="{{ __('Your Email') }}"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="company" placeholder="{{ __('Company (optional)') }}"
                                            value="{{ old('company') }}">
                                        @error('company')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" placeholder="{{ __('Phone (optional)') }}"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="message" rows="4" placeholder="{{ __('Tell us about your needs (optional)') }}">{{ old('message') }}</textarea>
                                        @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn float-btn flat-btn color-btn"
                                    style="margin-top:1rem;">{{ __('Send Request') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sec-lines"></div>
        </section>
    </div>
@endsection
