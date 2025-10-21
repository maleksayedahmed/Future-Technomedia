@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Blog Post</h1>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Blog Posts
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

        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" id="blogForm">
            @csrf
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Blog Content</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" value="{{ old('slug') }}"
                                    placeholder="auto-generated-from-title">
                                <small class="text-muted">Leave empty to auto-generate from title</small>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="excerpt" class="form-label">Excerpt</label>
                                <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3"
                                    placeholder="Brief description of the blog post">{{ old('excerpt') }}</textarea>
                                <small class="text-muted">Short summary that appears in blog listings</small>
                                @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="15"
                                    required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                    id="meta_title" name="meta_title" value="{{ old('meta_title') }}" maxlength="60">
                                <small class="text-muted">Recommended: 50-60 characters</small>
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                                    name="meta_description" rows="2" maxlength="160">{{ old('meta_description') }}</textarea>
                                <small class="text-muted">Recommended: 150-160 characters</small>
                                @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                                    id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords') }}"
                                    placeholder="keyword1, keyword2, keyword3">
                                <small class="text-muted">Comma-separated keywords</small>
                                @error('meta_keywords')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Publishing Options -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Publishing Options</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>
                                        Draft</option>
                                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Archived
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3" id="publishedAtGroup"
                                style="{{ old('status', 'draft') === 'published' ? '' : 'display: none;' }}">
                                <label for="published_at" class="form-label">Published At</label>
                                <input type="datetime-local"
                                    class="form-control @error('published_at') is-invalid @enderror" id="published_at"
                                    name="published_at" value="{{ old('published_at') }}">
                                <small class="text-muted">Leave empty to publish immediately</small>
                                @error('published_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured"
                                    value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    Featured Post
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Categories & Tags -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Categories & Tags</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Categories</label>
                                <div class="categories-list">
                                    @foreach ($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="category_{{ $category->id }}" name="categories[]"
                                                value="{{ $category->id }}"
                                                {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="category_{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('categories')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tags</label>
                                <div class="tags-list">
                                    @foreach ($tags as $tag)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="tag_{{ $tag->id }}"
                                                name="tags[]" value="{{ $tag->id }}"
                                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="tag_{{ $tag->id }}">
                                                {{ $tag->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('tags')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Featured Image</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                                    id="featured_image" name="featured_image" accept="image/*">
                                <small class="text-muted">Recommended size: 1200x600px. Max file size: 2MB</small>
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="imagePreview" class="mt-2" style="display: none;">
                                <img id="previewImg" src="" alt="Preview" class="img-fluid rounded">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="card shadow">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save"></i> Create Blog Post
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Auto-generate slug from title
        document.getElementById('title').addEventListener('input', function() {
            const title = this.value;
            const slugField = document.getElementById('slug');

            if (slugField.value === '' || slugField.dataset.autoGenerated) {
                const slug = title.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');

                slugField.value = slug;
                slugField.dataset.autoGenerated = true;
            }
        });

        // Show/hide published_at field based on status
        document.getElementById('status').addEventListener('change', function() {
            const publishedAtGroup = document.getElementById('publishedAtGroup');
            if (this.value === 'published') {
                publishedAtGroup.style.display = 'block';
            } else {
                publishedAtGroup.style.display = 'none';
                document.getElementById('published_at').value = '';
            }
        });

        // Image preview
        document.getElementById('featured_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

        // Initialize TinyMCE for content field
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof tinymce !== 'undefined') {
                tinymce.init({
                    selector: '#content',
                    height: 400,
                    menubar: false,
                    plugins: 'lists link image code',
                    toolbar: 'bold italic underline | bullist numlist | link image | code',
                    content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; }'
                });
            }
        });
    </script>

    <style>
        .categories-list,
        .tags-list {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #e1e5e9;
            border-radius: 0.375rem;
            padding: 0.75rem;
        }

        .categories-list .form-check,
        .tags-list .form-check {
            margin-bottom: 0.5rem;
        }

        .categories-list .form-check:last-child,
        .tags-list .form-check:last-child {
            margin-bottom: 0;
        }
    </style>
@endsection
