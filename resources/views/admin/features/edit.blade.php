@extends('admin.layouts.app')

@section('title', 'Edit Feature')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Edit Feature</h1>
            <div>
                <a href="{{ route('admin.features.show', $feature) }}" class="btn btn-info me-2">
                    <i class="fas fa-eye me-2"></i>View
                </a>
                <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Features
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
                    Edit Feature Information
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.features.update', $feature) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title', $feature->title) }}"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                  rows="4"
                                  required>{{ old('description', $feature->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="icon" class="form-label">Icon Class</label>
                                <input type="text"
                                       class="form-control @error('icon') is-invalid @enderror"
                                       id="icon"
                                       name="icon"
                                       value="{{ old('icon', $feature->icon) }}"
                                       placeholder="e.g., fal fa-desktop">
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Use Font Awesome icon classes (e.g., fal fa-desktop, fab fa-android)
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="order" class="form-label">Display Order</label>
                                <input type="number"
                                       class="form-control @error('order') is-invalid @enderror"
                                       id="order"
                                       name="order"
                                       value="{{ old('order', $feature->order) }}"
                                       min="0">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Lower numbers appear first</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="is_active"
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', $feature->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.features.index') }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Feature
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
                    Feature Details
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Created:</strong><br>
                    <small class="text-muted">{{ $feature->created_at->format('M d, Y \a\t h:i A') }}</small>
                </div>
                <div class="mb-3">
                    <strong>Last Updated:</strong><br>
                    <small class="text-muted">{{ $feature->updated_at->format('M d, Y \a\t h:i A') }}</small>
                </div>
                <div class="mb-3">
                    <strong>Current Status:</strong><br>
                    @if($feature->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Current Icon:</strong><br>
                    @if($feature->icon)
                        <i class="{{ $feature->icon }} fa-2x text-primary"></i>
                        <small class="d-block text-muted mt-1">{{ $feature->icon }}</small>
                    @else
                        <span class="text-muted">No icon set</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0">
                    <i class="fas fa-icons me-2"></i>
                    Popular Icons
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-4 text-center">
                        <i class="fal fa-desktop fa-2x text-primary mb-1"></i>
                        <small class="d-block">fal fa-desktop</small>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fal fa-mobile-android fa-2x text-primary mb-1"></i>
                        <small class="d-block">fal fa-mobile-android</small>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fab fa-pagelines fa-2x text-primary mb-1"></i>
                        <small class="d-block">fab fa-pagelines</small>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fal fa-shopping-bag fa-2x text-primary mb-1"></i>
                        <small class="d-block">fal fa-shopping-bag</small>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fal fa-code fa-2x text-primary mb-1"></i>
                        <small class="d-block">fal fa-code</small>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fal fa-palette fa-2x text-primary mb-1"></i>
                        <small class="d-block">fal fa-palette</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
