@extends('admin.layouts.app')

@section('title', 'Edit Setting')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Edit Setting: {{ $setting->label }}</h1>
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
                    <i class="fas fa-edit me-2"></i>Setting Details
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.update', $setting) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="key" class="form-label">Key <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="key" 
                                   id="key" 
                                   class="form-control @error('key') is-invalid @enderror" 
                                   value="{{ old('key', $setting->key) }}" 
                                   required>
                            @error('key')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                            <select name="type" 
                                    id="type" 
                                    class="form-control @error('type') is-invalid @enderror" 
                                    required>
                                <option value="text" {{ old('type', $setting->type) === 'text' ? 'selected' : '' }}>Text</option>
                                <option value="textarea" {{ old('type', $setting->type) === 'textarea' ? 'selected' : '' }}>Textarea</option>
                                <option value="image" {{ old('type', $setting->type) === 'image' ? 'selected' : '' }}>Image</option>
                                <option value="url" {{ old('type', $setting->type) === 'url' ? 'selected' : '' }}>URL</option>
                                <option value="boolean" {{ old('type', $setting->type) === 'boolean' ? 'selected' : '' }}>Boolean</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="group" class="form-label">Group <span class="text-danger">*</span></label>
                            <select name="group" 
                                    id="group" 
                                    class="form-control @error('group') is-invalid @enderror" 
                                    required>
                                <option value="general" {{ old('group', $setting->group) === 'general' ? 'selected' : '' }}>General</option>
                                <option value="social" {{ old('group', $setting->group) === 'social' ? 'selected' : '' }}>Social Media</option>
                                <option value="contact" {{ old('group', $setting->group) === 'contact' ? 'selected' : '' }}>Contact</option>
                                <option value="footer" {{ old('group', $setting->group) === 'footer' ? 'selected' : '' }}>Footer</option>
                            </select>
                            @error('group')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="order" class="form-label">Order</label>
                            <input type="number" 
                                   name="order" 
                                   id="order" 
                                   class="form-control @error('order') is-invalid @enderror" 
                                   value="{{ old('order', $setting->order) }}">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="label" class="form-label">Label <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="label" 
                               id="label" 
                               class="form-control @error('label') is-invalid @enderror" 
                               value="{{ old('label', $setting->label) }}" 
                               required>
                        @error('label')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" 
                                  id="description" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  rows="3">{{ old('description', $setting->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div id="value-field" class="mb-3" style="{{ $setting->type === 'image' ? 'display: none;' : '' }}">
                        <label for="value" class="form-label">Value</label>
                        @if($setting->type === 'textarea')
                            <textarea name="value" 
                                      id="value" 
                                      class="form-control @error('value') is-invalid @enderror" 
                                      rows="4">{{ old('value', $setting->value) }}</textarea>
                        @elseif($setting->type === 'boolean')
                            <div class="form-check">
                                <input type="hidden" name="value" value="0">
                                <input type="checkbox" 
                                       name="value" 
                                       id="value" 
                                       class="form-check-input" 
                                       value="1" 
                                       {{ old('value', $setting->value) ? 'checked' : '' }}>
                                <label class="form-check-label" for="value">Enabled</label>
                            </div>
                        @else
                            <input type="{{ $setting->type === 'url' ? 'url' : 'text' }}" 
                                   name="value" 
                                   id="value" 
                                   class="form-control @error('value') is-invalid @enderror" 
                                   value="{{ old('value', $setting->value) }}"
                                   {{ $setting->type === 'url' ? 'placeholder=https://...' : '' }}>
                        @endif
                        @error('value')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div id="image-field" class="mb-3" style="{{ $setting->type !== 'image' ? 'display: none;' : '' }}">
                        <label for="image" class="form-label">Image</label>
                        @if($setting->type === 'image' && $setting->hasMedia('images'))
                            <div class="mb-2">
                                <img src="{{ $setting->getFirstMediaUrl('images') }}" 
                                     alt="{{ $setting->label }}" 
                                     class="img-thumbnail" 
                                     style="max-width: 200px; max-height: 100px;">
                            </div>
                        @endif
                        <input type="file" 
                               name="image" 
                               id="image" 
                               class="form-control @error('image') is-invalid @enderror" 
                               accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Setting
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
