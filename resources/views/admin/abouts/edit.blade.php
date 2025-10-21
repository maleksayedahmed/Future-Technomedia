@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit About Page Content</h1>
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

                        <form action="{{ route('admin.abouts.update', $about) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Hero Section -->
                            <h5 class="text-primary mb-3">
                                <i class="fas fa-star"></i> Hero Section
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="hero_title" class="form-label">Hero Title</label>
                                        <input type="text" class="form-control @error('hero_title') is-invalid @enderror"
                                            id="hero_title" name="hero_title"
                                            value="{{ old('hero_title', $about->hero_title) }}"
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
                                            id="hero_subtitle" name="hero_subtitle"
                                            value="{{ old('hero_subtitle', $about->hero_subtitle) }}"
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
                                    name="hero_description" rows="3" placeholder="Brief description about your company">{{ old('hero_description', $about->hero_description) }}</textarea>
                                @error('hero_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hero_background" class="form-label">Hero Background Image</label>
                                @if ($about->getFirstMedia('hero_background'))
                                    <div class="mb-2">
                                        <img src="{{ $about->getFirstMedia('hero_background')->getUrl('thumb') }}"
                                            alt="Current Hero Background"
                                            style="max-width: 200px; max-height: 100px; object-fit: cover;">
                                        <p class="text-muted small mt-1">Current image - upload new image to replace</p>
                                    </div>
                                @endif
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
                                            id="services_title" name="services_title"
                                            value="{{ old('services_title', $about->services_title) }}"
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
                                            value="{{ old('services_subtitle', $about->services_subtitle) }}"
                                            placeholder="e.g., // What We Do">
                                        @error('services_subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Services Management -->
                            <div class="mb-3">
                                <label class="form-label">Services</label>
                                <div id="services-container">
                                    @if ($about->services && is_array($about->services))
                                        @foreach ($about->services as $index => $service)
                                            <div class="service-item border rounded p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label class="form-label">Service Title</label>
                                                            <input type="text" class="form-control"
                                                                name="services[{{ $index }}][title]"
                                                                value="{{ $service['title'] ?? '' }}"
                                                                placeholder="e.g., Web Design">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label class="form-label">Icon Class</label>
                                                            <input type="text" class="form-control"
                                                                name="services[{{ $index }}][icon]"
                                                                value="{{ $service['icon'] ?? '' }}"
                                                                placeholder="e.g., fal fa-desktop">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" name="services[{{ $index }}][description]" rows="2"
                                                        placeholder="Service description">{{ $service['description'] ?? '' }}</textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Features (one per line)</label>
                                                        <textarea class="form-control" name="services[{{ $index }}][features]" rows="3"
                                                            placeholder="Concept&#10;Design&#10;3D Modeling">{{ is_array($service['features'] ?? null) ? implode("\n", $service['features']) : $service['features'] ?? '' }}</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Service Image</label>
                                                        @if (isset($service['image_url']) && $service['image_url'])
                                                            <div class="mb-2">
                                                                <img src="{{ $service['image_url'] }}"
                                                                    alt="Current service image"
                                                                    style="max-width: 100px; max-height: 60px; object-fit: cover;">
                                                                <p class="text-muted small">Current image - upload new to
                                                                    replace</p>
                                                            </div>
                                                        @endif
                                                        <input type="file" class="form-control"
                                                            name="service_images[{{ $index }}]" accept="image/*">
                                                        <div class="form-text">Upload an image for this service
                                                            (recommended: 400x300px)</div>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="button" class="btn btn-sm btn-danger remove-service">
                                                        <i class="fas fa-trash"></i> Remove Service
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-sm btn-success" id="add-service">
                                    <i class="fas fa-plus"></i> Add Service
                                </button>
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
                                            class="form-control @error('video_title') is-invalid @enderror"
                                            id="video_title" name="video_title"
                                            value="{{ old('video_title', $about->video_title) }}"
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
                                            value="{{ old('video_button_text', $about->video_button_text) }}"
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
                                        @if ($about->getFirstMedia('presentation_pdf'))
                                            <div class="mb-2">
                                                <i class="fas fa-file-pdf text-danger"></i>
                                                <a href="{{ $about->getFirstMediaUrl('presentation_pdf') }}"
                                                    target="_blank" class="text-decoration-none ms-2">
                                                    View Current PDF
                                                </a>
                                                <p class="text-muted small mt-1">Current PDF - upload new file to replace
                                                </p>
                                            </div>
                                        @endif
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
                                        @if ($about->getFirstMedia('video_thumbnail'))
                                            <div class="mb-2">
                                                <img src="{{ $about->getFirstMedia('video_thumbnail')->getUrl('thumb') }}"
                                                    alt="Current Video Thumbnail"
                                                    style="max-width: 200px; max-height: 100px; object-fit: cover;">
                                                <p class="text-muted small mt-1">Current thumbnail - upload new image to
                                                    replace</p>
                                            </div>
                                        @endif
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
                                    name="video_description" rows="3" placeholder="Description text that appears next to the video">{{ old('video_description', $about->video_description) }}</textarea>
                                @error('video_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="presentation_video" class="form-label">Presentation Video File</label>
                                @if ($about->getFirstMedia('presentation_video'))
                                    <div class="mb-2">
                                        <video style="max-width: 200px; max-height: 100px;" controls>
                                            <source src="{{ $about->getFirstMediaUrl('presentation_video') }}"
                                                type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <p class="text-muted small mt-1">Current video - upload new video to replace</p>
                                    </div>
                                @endif
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
                                            name="cta_title" value="{{ old('cta_title', $about->cta_title) }}"
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
                                            value="{{ old('cta_button_text', $about->cta_button_text) }}"
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
                                    id="cta_button_url" name="cta_button_url"
                                    value="{{ old('cta_button_url', $about->cta_button_url) }}"
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
                                            id="order" name="order" value="{{ old('order', $about->order) }}"
                                            min="0">
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
                                                name="is_active"
                                                {{ old('is_active', $about->is_active) ? 'checked' : '' }}>
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
                                    <i class="fas fa-save"></i> Update About Content
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
                                <strong>Services:</strong> Use FontAwesome icon classes (e.g., fal fa-desktop)
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-lightbulb text-warning"></i>
                                <strong>Features:</strong> One feature per line in the textarea
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-lightbulb text-warning"></i>
                                <strong>Service Images:</strong> Upload images for each service (recommended: 400x300px)
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let serviceIndex = {{ count($about->services ?? []) }};

            document.getElementById('add-service').addEventListener('click', function() {
                addServiceField();
            });

            function addServiceField() {
                const container = document.getElementById('services-container');
                const serviceHtml = `
            <div class="service-item border rounded p-3 mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label">Service Title</label>
                            <input type="text" class="form-control" name="services[${serviceIndex}][title]"
                                   placeholder="e.g., Web Design">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label">Icon Class</label>
                            <input type="text" class="form-control" name="services[${serviceIndex}][icon]"
                                   placeholder="e.g., fal fa-desktop">
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="services[${serviceIndex}][description]" rows="2"
                              placeholder="Service description"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Features (one per line)</label>
                        <textarea class="form-control" name="services[${serviceIndex}][features]" rows="3"
                                  placeholder="Concept&#10;Design&#10;3D Modeling"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Service Image</label>
                        <input type="file" class="form-control" name="service_images[${serviceIndex}]"
                               accept="image/*">
                        <div class="form-text">Upload an image for this service (recommended: 400x300px)</div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="button" class="btn btn-sm btn-danger remove-service">
                        <i class="fas fa-trash"></i> Remove Service
                    </button>
                </div>
            </div>
        `;
                container.insertAdjacentHTML('beforeend', serviceHtml);
                serviceIndex++;
                attachRemoveListeners();
            }

            function attachRemoveListeners() {
                document.querySelectorAll('.remove-service').forEach(button => {
                    button.addEventListener('click', function() {
                        this.closest('.service-item').remove();
                    });
                });
            }

            // Attach listeners to existing remove buttons
            attachRemoveListeners();
        });
    </script>
@endsection
