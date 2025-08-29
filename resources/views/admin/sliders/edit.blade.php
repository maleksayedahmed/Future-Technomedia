@extends('admin.layouts.app')

@section('title', 'Edit Slider')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Edit Slider</h1>
            <div>
                <a href="{{ route('admin.sliders.show', $slider) }}" class="btn btn-info me-2">
                    <i class="fas fa-eye me-2"></i>View
                </a>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Sliders
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
                    Edit Slider Information
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title', $slider->title) }}"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                  rows="4">{{ old('description', $slider->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="button_text" class="form-label">Button Text</label>
                                <input type="text"
                                       class="form-control @error('button_text') is-invalid @enderror"
                                       id="button_text"
                                       name="button_text"
                                       value="{{ old('button_text', $slider->button_text) }}">
                                @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="button_link" class="form-label">Button Link</label>
                                <input type="url"
                                       class="form-control @error('button_link') is-invalid @enderror"
                                       id="button_link"
                                       name="button_link"
                                       value="{{ old('button_link', $slider->button_link) }}"
                                       placeholder="https://example.com">
                                @error('button_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="order" class="form-label">Display Order</label>
                                <input type="number"
                                       class="form-control @error('order') is-invalid @enderror"
                                       id="order"
                                       name="order"
                                       value="{{ old('order', $slider->order) }}"
                                       min="0">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Lower numbers appear first</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="is_active"
                                           name="is_active"
                                           value="1"
                                           {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Update Slider Image</label>
                        <input type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               id="image"
                               name="image"
                               accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Leave empty to keep current image. Recommended size: 1920x1080px. Max file size: 2MB
                        </small>

                        <!-- Current Image -->
                        @if($slider->getFirstMediaUrl('slider_images'))
                            <div class="mt-3">
                                <label class="form-label">Current Image:</label>
                                <div>
                                    <img src="{{ $slider->getFirstMediaUrl('slider_images', 'thumb') }}"
                                         alt="{{ $slider->title }}"
                                         class="img-fluid"
                                         style="max-height: 200px; border-radius: 8px;">
                                </div>
                            </div>
                        @endif

                        <!-- New Image Preview -->
                        <div id="imagePreview" class="mt-3" style="display: none;">
                            <label class="form-label">New Image Preview:</label>
                            <div>
                                <img id="previewImg" src="" alt="Preview" class="img-fluid" style="max-height: 200px; border-radius: 8px;">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Slider
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
                    Slider Details
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Created:</strong><br>
                    <small class="text-muted">{{ $slider->created_at->format('M d, Y \a\t h:i A') }}</small>
                </div>
                <div class="mb-3">
                    <strong>Last Updated:</strong><br>
                    <small class="text-muted">{{ $slider->updated_at->format('M d, Y \a\t h:i A') }}</small>
                </div>
                <div class="mb-3">
                    <strong>Current Status:</strong><br>
                    @if($slider->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0">
                    <i class="fas fa-lightbulb me-2"></i>
                    Quick Tips
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        Changes will be visible immediately on the frontend
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        Only upload a new image if you want to replace the current one
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        Inactive sliders won't appear on the website
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        document.getElementById('imagePreview').style.display = 'none';
    }
});
</script>
@endpush
