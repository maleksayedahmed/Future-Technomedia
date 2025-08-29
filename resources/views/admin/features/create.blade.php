@extends('admin.layouts.app')

@section('title', 'Create Feature')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Create New Feature</h1>
            <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Features
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
                    Feature Information
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.features.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title') }}"
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
                                  required>{{ old('description') }}</textarea>
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
                                       value="{{ old('icon') }}"
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
                                       value="{{ old('order', 0) }}"
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
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.features.index') }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Feature
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
                        <strong>Title:</strong> Keep it short and descriptive
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        <strong>Description:</strong> Explain the benefit clearly
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        <strong>Icon:</strong> Use Font Awesome classes for best results
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        <strong>Order:</strong> Control display sequence with numbers
                    </li>
                </ul>
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

@push('scripts')
<script>
// Icon preview functionality
document.getElementById('icon').addEventListener('input', function(e) {
    const iconClass = e.target.value;
    // You can add icon preview functionality here if needed
});
</script>
@endpush
