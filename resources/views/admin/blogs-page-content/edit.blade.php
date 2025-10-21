@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blogs Page Content Management</h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.blogs-page-content.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Hero Section Settings -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hero Section</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="hero_title" class="form-label">Hero Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('hero_title') is-invalid @enderror"
                                    id="hero_title" name="hero_title" value="{{ old('hero_title', $content->hero_title) }}"
                                    required>
                                @error('hero_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="hero_subtitle" class="form-label">Hero Subtitle <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('hero_subtitle') is-invalid @enderror"
                                    id="hero_subtitle" name="hero_subtitle"
                                    value="{{ old('hero_subtitle', $content->hero_subtitle) }}" required>
                                @error('hero_subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="hero_description" class="form-label">Hero Description</label>
                        <textarea class="form-control @error('hero_description') is-invalid @enderror" id="hero_description"
                            name="hero_description" rows="3">{{ old('hero_description', $content->hero_description) }}</textarea>
                        @error('hero_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="hero_scroll_text" class="form-label">Scroll Button Text <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('hero_scroll_text') is-invalid @enderror"
                                    id="hero_scroll_text" name="hero_scroll_text"
                                    value="{{ old('hero_scroll_text', $content->hero_scroll_text) }}" required>
                                @error('hero_scroll_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="hero_background_image" class="form-label">Background Image</label>
                                <input type="file"
                                    class="form-control @error('hero_background_image') is-invalid @enderror"
                                    id="hero_background_image" name="hero_background_image" accept="image/*">
                                <small class="text-muted">Recommended size: 1920x1080px. Max file size: 2MB</small>
                                @error('hero_background_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @if ($content->hero_background_image)
                        <div class="mb-3">
                            <label class="form-label">Current Background Image:</label>
                            <div>
                                <img src="{{ asset('storage/' . $content->hero_background_image) }}" alt="Hero Background"
                                    class="img-fluid rounded" style="max-height: 200px;">
                            </div>
                        </div>
                    @endif

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                            {{ old('is_active', $content->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Page Content Active
                        </label>
                    </div>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">SEO Settings</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title"
                            name="meta_title" value="{{ old('meta_title', $content->meta_title) }}" maxlength="60">
                        <small class="text-muted">Recommended: 50-60 characters</small>
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                            name="meta_description" rows="2" maxlength="160">{{ old('meta_description', $content->meta_description) }}</textarea>
                        <small class="text-muted">Recommended: 150-160 characters</small>
                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                            id="meta_keywords" name="meta_keywords"
                            value="{{ old('meta_keywords', $content->meta_keywords) }}"
                            placeholder="keyword1, keyword2, keyword3">
                        <small class="text-muted">Comma-separated keywords</small>
                        @error('meta_keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="card shadow">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Blogs Page Content
                    </button>
                    <a href="{{ route('blogs.index') }}" class="btn btn-outline-info ms-2" target="_blank">
                        <i class="fas fa-eye"></i> Preview Blogs Page
                    </a>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image preview functionality
            const imageInput = document.getElementById('hero_background_image');

            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Basic file validation
                    const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif',
                        'image/svg+xml'];
                    const maxSize = 2 * 1024 * 1024; // 2MB

                    if (!validTypes.includes(file.type)) {
                        alert('Please select a valid image file (JPEG, PNG, GIF, or SVG).');
                        this.value = '';
                        return;
                    }

                    if (file.size > maxSize) {
                        alert('File size must be less than 2MB.');
                        this.value = '';
                        return;
                    }
                }
            });

            // Character count for meta fields
            const metaTitle = document.getElementById('meta_title');
            const metaDesc = document.getElementById('meta_description');

            function updateCharCount(input, max) {
                const count = input.value.length;
                const color = count > max ? 'text-danger' : (count > max * 0.9 ? 'text-warning' : 'text-muted');
                let counter = input.parentNode.querySelector('.char-count');

                if (!counter) {
                    counter = document.createElement('small');
                    counter.className = 'char-count';
                    input.parentNode.appendChild(counter);
                }

                counter.className = `char-count ${color}`;
                counter.textContent = `${count}/${max} characters`;
            }

            if (metaTitle) {
                metaTitle.addEventListener('input', function() {
                    updateCharCount(this, 60);
                });
                updateCharCount(metaTitle, 60);
            }

            if (metaDesc) {
                metaDesc.addEventListener('input', function() {
                    updateCharCount(this, 160);
                });
                updateCharCount(metaDesc, 160);
            }
        });
    </script>
@endsection
