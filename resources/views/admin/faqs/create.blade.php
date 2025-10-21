@extends('admin.layouts.app')

@section('title', 'Create FAQ')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Create New FAQ</h1>
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to FAQs
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
                        FAQ Information
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.faqs.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('question') is-invalid @enderror"
                                id="question" name="question" value="{{ old('question') }}"
                                placeholder="e.g., What services do you offer?" required>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                The question that will be displayed to users
                            </small>
                        </div>

                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="8"
                                placeholder="Provide a detailed answer to the question..." required>{{ old('answer') }}</textarea>
                            @error('answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                The detailed answer that will be shown when the question is expanded
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
                                    <small class="form-text text-muted">Only active FAQs will be displayed on the
                                        website</small>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.faqs.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create FAQ
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
                            <strong>Question:</strong> Keep it clear and concise
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            <strong>Answer:</strong> Provide detailed, helpful information
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            <strong>Order:</strong> Control the display sequence of FAQs
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning me-2"></i>
                            <strong>Status:</strong> Use to temporarily hide FAQs without deleting
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-question-circle me-2"></i>
                        Examples
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Good Question:</strong>
                        <div class="small text-muted mb-2">
                            "What services do you offer?"
                        </div>
                        <strong>Good Answer:</strong>
                        <div class="small text-muted">
                            "We offer web development, mobile app development, UI/UX design, and digital marketing services.
                            Our team specializes in creating custom solutions tailored to your business needs."
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
