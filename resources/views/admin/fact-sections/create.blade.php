@extends('admin.layouts.app')

@section('title', 'Create Fact Section')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Create New Fact Section</h1>
                <a href="{{ route('admin.fact-sections.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Sections
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-plus me-2"></i>
                        Section Information
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.fact-sections.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Section Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}"
                                placeholder="e.g., Some Interesting Facts About Me">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                The main heading for the facts section
                            </small>
                        </div>

                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Section Subtitle</label>
                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                id="subtitle" name="subtitle" value="{{ old('subtitle') }}" placeholder="e.g., Numbers">
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                The subtitle that appears below the main title
                            </small>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="3" placeholder="Optional description for the section">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Optional description (not displayed on frontend)
                            </small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Display Order</label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                                        id="order" name="order" value="{{ old('order', 0) }}" min="0">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Lower numbers appear first</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                            value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active
                                        </label>
                                    </div>
                                    <small class="form-text text-muted">Only active sections will be displayed on the
                                        website</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="background_image" class="form-label">Background Image</label>
                            <input type="file" class="form-control @error('background_image') is-invalid @enderror"
                                id="background_image" name="background_image" accept="image/*">
                            @error('background_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Upload a background image for the facts section (optional). Supported formats: JPEG, PNG,
                                GIF, WebP. Max size: 2MB
                            </small>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.fact-sections.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create Section
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Quick Tips
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            <strong>Title:</strong> The main heading for your facts section
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            <strong>Subtitle:</strong> Appears below the main title
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            <strong>Background Image:</strong> Used as parallax background
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            <strong>Order:</strong> Control display sequence
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-images me-2"></i>
                        Background Image Tips
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Recommended:</strong>
                        <ul class="mb-0 mt-2">
                            <li>High resolution images (1920x1080 or larger)</li>
                            <li>Landscape orientation</li>
                            <li>Good contrast for text readability</li>
                            <li>File size under 2MB</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
