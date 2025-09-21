@extends('admin.layouts.app')

@section('title', 'Create Fact')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Create New Fact</h1>
                <a href="{{ route('admin.facts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Facts
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
                        Fact Information
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.facts.store') }}" method="POST">
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
                                Optional: Used for section headers. Leave empty for regular facts.
                            </small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="number" class="form-label">Number <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('number') is-invalid @enderror"
                                        id="number" name="number" value="{{ old('number') }}" min="0" required>
                                    @error('number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        The animated number that will be displayed
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="label" class="form-label">Label <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('label') is-invalid @enderror"
                                        id="label" name="label" value="{{ old('label') }}"
                                        placeholder="e.g., Finished projects" required>
                                    @error('label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        The text displayed below the number
                                    </small>
                                </div>
                            </div>
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
                                    <small class="form-text text-muted">Only active facts will be displayed on the
                                        website</small>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.facts.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create Fact
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
                            <strong>Section Title:</strong> Use only for section headers (leave empty for regular facts)
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            <strong>Number:</strong> The animated counter value
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            <strong>Label:</strong> Descriptive text under the number
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
                        Examples
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Regular Fact:</strong>
                        <div class="small text-muted">
                            Number: 145<br>
                            Label: Finished projects<br>
                            Title: (leave empty)
                        </div>
                    </div>
                    <div class="mb-3">
                        <strong>Section Header:</strong>
                        <div class="small text-muted">
                            Number: 0 (or any)<br>
                            Label: Numbers (or any)<br>
                            Title: Some Interesting Facts About Me
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
