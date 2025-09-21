@extends('admin.layouts.app')

@section('title', 'Edit Fact Section')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Edit Fact Section</h1>
                <div>
                    <a href="{{ route('admin.fact-sections.show', $factSection) }}" class="btn btn-info me-2">
                        <i class="fas fa-eye me-2"></i>View
                    </a>
                    <a href="{{ route('admin.fact-sections.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Sections
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-edit me-2"></i>
                        Edit Section Information
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.fact-sections.update', $factSection) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Section Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title', $factSection->title) }}"
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
                                id="subtitle" name="subtitle" value="{{ old('subtitle', $factSection->subtitle) }}"
                                placeholder="e.g., Numbers">
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
                                rows="3" placeholder="Optional description for the section">{{ old('description', $factSection->description) }}</textarea>
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
                                        id="order" name="order" value="{{ old('order', $factSection->order) }}"
                                        min="0">
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
                                            value="1"
                                            {{ old('is_active', $factSection->is_active) ? 'checked' : '' }}>
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
                            @if ($factSection->hasMedia('background_images'))
                                <div class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $factSection->getFirstMediaUrl('background_images', 'thumb') }}"
                                            alt="Current background" class="img-thumbnail me-3"
                                            style="width: 100px; height: 70px; object-fit: cover;">
                                        <div>
                                            <p class="mb-1"><strong>Current Image</strong></p>
                                            <small class="text-muted">Upload a new image to replace the current one</small>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('background_image') is-invalid @enderror"
                                id="background_image" name="background_image" accept="image/*">
                            @error('background_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Upload a background image for the facts section. Supported formats: JPEG, PNG, GIF, WebP.
                                Max size: 2MB
                            </small>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.fact-sections.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Section
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
                        <i class="fas fa-chart-line me-2"></i>
                        Section Facts
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Facts in this section:</strong> {{ $factSection->facts->count() }}
                    </div>
                    @if ($factSection->facts->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach ($factSection->facts as $fact)
                                <div class="list-group-item px-0 py-2">
                                    <small class="text-muted">{{ $fact->label }}:
                                        {{ number_format($fact->number) }}</small>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <small class="text-muted">No facts added yet</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
