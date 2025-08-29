@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Site Settings</h1>
            <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Setting
            </a>
        </div>
    </div>
</div>

<form action="{{ route('admin.settings.bulk-update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    
    @foreach($groupedSettings as $group => $settings)
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-{{ $group === 'general' ? 'cog' : ($group === 'social' ? 'share-alt' : ($group === 'contact' ? 'phone' : 'info-circle')) }} me-2"></i>
                        {{ ucfirst($group) }} Settings
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($settings as $setting)
                        <div class="col-md-6 mb-3">
                            <label for="setting_{{ $setting->key }}" class="form-label">
                                {{ $setting->label }}
                                @if($setting->description)
                                    <small class="text-muted d-block">{{ $setting->description }}</small>
                                @endif
                            </label>
                            
                            @if($setting->type === 'textarea')
                                <textarea name="settings[{{ $setting->key }}]" 
                                         id="setting_{{ $setting->key }}" 
                                         class="form-control" 
                                         rows="4">{{ $setting->value }}</textarea>
                            @elseif($setting->type === 'boolean')
                                <div class="form-check">
                                    <input type="hidden" name="settings[{{ $setting->key }}]" value="0">
                                    <input type="checkbox" 
                                           name="settings[{{ $setting->key }}]" 
                                           id="setting_{{ $setting->key }}" 
                                           class="form-check-input" 
                                           value="1" 
                                           {{ $setting->value ? 'checked' : '' }}>
                                    <label class="form-check-label" for="setting_{{ $setting->key }}">
                                        {{ $setting->label }}
                                    </label>
                                </div>
                            @elseif($setting->type === 'image')
                                <div>
                                    @if($setting->hasMedia('images'))
                                        <div class="mb-2">
                                            <img src="{{ $setting->getFirstMediaUrl('images') }}" 
                                                 alt="{{ $setting->label }}" 
                                                 class="img-thumbnail" 
                                                 style="max-width: 200px; max-height: 100px;">
                                        </div>
                                    @endif
                                    <input type="file" 
                                           name="{{ $setting->key }}" 
                                           id="setting_{{ $setting->key }}" 
                                           class="form-control" 
                                           accept="image/*">
                                </div>
                            @else
                                <input type="{{ $setting->type === 'url' ? 'url' : 'text' }}" 
                                       name="settings[{{ $setting->key }}]" 
                                       id="setting_{{ $setting->key }}" 
                                       class="form-control" 
                                       value="{{ $setting->value }}"
                                       {{ $setting->type === 'url' ? 'placeholder=https://...' : '' }}>
                            @endif
                            
                            <div class="d-flex justify-content-end mt-1">
                                <a href="{{ route('admin.settings.edit', $setting) }}" 
                                   class="btn btn-sm btn-outline-primary me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.settings.destroy', $setting) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this setting?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-save me-2"></i>Save All Settings
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('styles')
<style>
    .image-preview {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }
</style>
@endpush
