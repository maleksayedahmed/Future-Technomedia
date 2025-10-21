@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create About Page Content</h1>
            <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to About Content
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">About Page Information</h6>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Hero Section -->
                            <h5 class="text-primary mb-3">
                                <i class="fas fa-star"></i> Hero Section
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="hero_title" class="form-label">Hero Title</label>
                                        <input type="text" class="form-control @error('hero_title') is-invalid @enderror"
                                            id="hero_title" name="hero_title" value="{{ old('hero_title') }}"
                                            placeholder="e.g., About Our Company">
                                        @error('hero_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="hero_subtitle" class="form-label">Hero Subtitle</label>
                                        <input type="text"
                                            class="form-control @error('hero_subtitle') is-invalid @enderror"
                                            id="hero_subtitle" name="hero_subtitle" value="{{ old('hero_subtitle') }}"
                                            placeholder="e.g., // About Us">
                                        @error('hero_subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="hero_description" class="form-label">Hero Description</label>
                                <textarea class="form-control @error('hero_description') is-invalid @enderror" id="hero_description"
                                    name="hero_description" rows="3" placeholder="Brief description about your company">{{ old('hero_description') }}</textarea>
                                @error('hero_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hero_background" class="form-label">Hero Background Image</label>
                                <input type="file" class="form-control @error('hero_background') is-invalid @enderror"
                                    id="hero_background" name="hero_background" accept="image/*">
                                <div class="form-text">Recommended size: 1920x1080px. Max file size: 5MB</div>
                                @error('hero_background')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Services Section -->
                            <h5 class="text-primary mb-3 mt-4">
                                <i class="fas fa-cogs"></i> Services Section
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="services_title" class="form-label">Services Title</label>
                                        <input type="text"
                                            class="form-control @error('services_title') is-invalid @enderror"
                                            id="services_title" name="services_title" value="{{ old('services_title') }}"
                                            placeholder="e.g., Our Services">
                                        @error('services_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="services_subtitle" class="form-label">Services Subtitle</label>
                                        <input type="text"
                                            class="form-control @error('services_subtitle') is-invalid @enderror"
                                            id="services_subtitle" name="services_subtitle"
                                            value="{{ old('services_subtitle') }}" placeholder="e.g., // What We Do">
                                        @error('services_subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Video Section -->
                            <h5 class="text-primary mb-3 mt-4">
                                <i class="fas fa-video"></i> Video Section
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="video_title" class="form-label">Video Title</label>
                                        <input type="text"
                                            class="form-control @error('video_title') is-invalid @enderror" id="video_title"
                                            name="video_title" value="{{ old('video_title') }}"
                                            placeholder="e.g., Our Story in Motion">
                                        @error('video_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="video_button_text" class="form-label">Video Button Text</label>
                                        <input type="text"
                                            class="form-control @error('video_button_text') is-invalid @enderror"
                                            id="video_button_text" name="video_button_text"
                                            value="{{ old('video_button_text', 'My Youtube Channel') }}"
                                            placeholder="e.g., Watch Our Story">
                                        @error('video_button_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="presentation_pdf" class="form-label">Presentation PDF</label>
                                        <input type="file"
                                            class="form-control @error('presentation_pdf') is-invalid @enderror"
                                            id="presentation_pdf" name="presentation_pdf" accept=".pdf">
                                        <div class="form-text">Upload a PDF file that will open when clicking the video
                                            button. Max file size: 10MB</div>
                                        @error('presentation_pdf')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="video_thumbnail" class="form-label">Video Thumbnail Image</label>
                                        <input type="file"
                                            class="form-control @error('video_thumbnail') is-invalid @enderror"
                                            id="video_thumbnail" name="video_thumbnail" accept="image/*">
                                        <div class="form-text">Recommended size: 600x400px. Max file size: 5MB</div>
                                        @error('video_thumbnail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="video_description" class="form-label">Video Description</label>
                                <textarea class="form-control @error('video_description') is-invalid @enderror" id="video_description"
                                    name="video_description" rows="3" placeholder="Description text that appears next to the video">{{ old('video_description') }}</textarea>
                                @error('video_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="presentation_video" class="form-label">Presentation Video File</label>
                                <input type="file"
                                    class="form-control @error('presentation_video') is-invalid @enderror"
                                    id="presentation_video" name="presentation_video" accept="video/*">
                                <div class="form-text">Supported formats: MP4, AVI, MOV, WMV. Max file size: 50MB</div>
                                @error('presentation_video')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- CTA Section -->
                            <h5 class="text-primary mb-3 mt-4">
                                <i class="fas fa-bullhorn"></i> Call-to-Action Section
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cta_title" class="form-label">CTA Title</label>
                                        <input type="text"
                                            class="form-control @error('cta_title') is-invalid @enderror" id="cta_title"
                                            name="cta_title"
                                            value="{{ old('cta_title', 'Ready To Order Your Project?') }}"
                                            placeholder="e.g., Ready To Start Your Project?">
                                        @error('cta_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cta_button_text" class="form-label">CTA Button Text</label>
                                        <input type="text"
                                            class="form-control @error('cta_button_text') is-invalid @enderror"
                                            id="cta_button_text" name="cta_button_text"
                                            value="{{ old('cta_button_text', 'Get In Touch') }}"
                                            placeholder="e.g., Contact Us">
                                        @error('cta_button_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="cta_button_url" class="form-label">CTA Button URL</label>
                                <input type="url" class="form-control @error('cta_button_url') is-invalid @enderror"
                                    id="cta_button_url" name="cta_button_url" value="{{ old('cta_button_url', '#') }}"
                                    placeholder="https://... or #contact">
                                @error('cta_button_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Settings -->
                            <h5 class="text-primary mb-3 mt-4">
                                <i class="fas fa-cog"></i> Settings
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="order" class="form-label">Display Order</label>
                                        <input type="number" class="form-control @error('order') is-invalid @enderror"
                                            id="order" name="order" value="{{ old('order', 0) }}" min="0">
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active"
                                                name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Active (Display on website)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary me-md-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Create About Content
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tips</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fas fa-lightbulb text-warning"></i>
                                <strong>Hero Background:</strong> Use high-quality images (1920x1080px recommended)
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-lightbulb text-warning"></i>
                                <strong>Video:</strong> MP4 format works best across all browsers
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-lightbulb text-warning"></i>
                                <strong>PDF Presentation:</strong> Upload your presentation PDF (max 10MB)
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-lightbulb text-warning"></i>
                                <strong>Services:</strong> Will be managed separately in the edit form
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-lightbulb text-warning"></i>
                                <strong>Order:</strong> Lower numbers appear first if multiple entries exist
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-lightbulb text-warning"></i>
                                <strong>CTA URL:</strong> Use #contact for same-page contact section
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
