@extends('admin.layouts.app')

@section('title', 'Create Setting')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Create New Setting</h1>
                <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Settings
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-plus me-2"></i>Setting Details
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="key" class="form-label">Key <span class="text-danger">*</span></label>
                                <input type="text" name="key" id="key"
                                    class="form-control @error('key') is-invalid @enderror" value="{{ old('key') }}"
                                    placeholder="e.g., company_name" required>
                                @error('key')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                                <select name="type" id="type"
                                    class="form-control @error('type') is-invalid @enderror" required>
                                    <option value="">Select Type</option>
                                    <option value="text" {{ old('type') === 'text' ? 'selected' : '' }}>Text</option>
                                    <option value="textarea" {{ old('type') === 'textarea' ? 'selected' : '' }}>Textarea
                                    </option>
                                    <option value="image" {{ old('type') === 'image' ? 'selected' : '' }}>Image</option>
                                    <option value="url" {{ old('type') === 'url' ? 'selected' : '' }}>URL</option>
                                    <option value="boolean" {{ old('type') === 'boolean' ? 'selected' : '' }}>Boolean
                                    </option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="group" class="form-label">Group <span class="text-danger">*</span></label>
                                <select name="group" id="group"
                                    class="form-control @error('group') is-invalid @enderror" required>
                                    <option value="">Select Group</option>
                                    <option value="general" {{ old('group') === 'general' ? 'selected' : '' }}>General
                                    </option>
                                    <option value="social" {{ old('group') === 'social' ? 'selected' : '' }}>Social Media
                                    </option>
                                    <option value="contact" {{ old('group') === 'contact' ? 'selected' : '' }}>Contact
                                    </option>
                                    <option value="footer" {{ old('group') === 'footer' ? 'selected' : '' }}>Footer
                                    </option>
                                </select>
                                @error('group')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Order</label>
                                <input type="number" name="order" id="order"
                                    class="form-control @error('order') is-invalid @enderror"
                                    value="{{ old('order', 0) }}">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="label" class="form-label">Label <span class="text-danger">*</span></label>
                            <input type="text" name="label" id="label"
                                class="form-control @error('label') is-invalid @enderror" value="{{ old('label') }}"
                                placeholder="Human readable label" required>
                            @error('label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                rows="3" placeholder="Brief description of this setting">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="value-field" class="mb-3">
                            <label for="value" class="form-label">Value</label>
                            <input type="text" name="value" id="value"
                                class="form-control @error('value') is-invalid @enderror" value="{{ old('value') }}">
                            @error('value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="image-field" class="mb-3" style="display: none;">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create Setting
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.getElementById('type').addEventListener('change', function() {
            const type = this.value;
            const valueField = document.getElementById('value-field');
            const imageField = document.getElementById('image-field');
            const valueInput = document.getElementById('value');

            if (type === 'image') {
                valueField.style.display = 'none';
                imageField.style.display = 'block';
            } else {
                valueField.style.display = 'block';
                imageField.style.display = 'none';

                if (type === 'textarea') {
                    const textarea = document.createElement('textarea');
                    textarea.name = 'value';
                    textarea.id = 'value';
                    textarea.className = 'form-control';
                    textarea.rows = 4;
                    textarea.value = valueInput.value;
                    valueInput.parentNode.replaceChild(textarea, valueInput);
                } else if (valueInput.tagName === 'TEXTAREA') {
                    const input = document.createElement('input');
                    input.type = type === 'url' ? 'url' : 'text';
                    input.name = 'value';
                    input.id = 'value';
                    input.className = 'form-control';
                    input.value = valueInput.value;
                    if (type === 'url') input.placeholder = 'https://...';
                    valueInput.parentNode.replaceChild(input, valueInput);
                } else {
                    valueInput.type = type === 'url' ? 'url' : 'text';
                    valueInput.placeholder = type === 'url' ? 'https://...' : '';
                }
            }
        });
    </script>
@endpush
