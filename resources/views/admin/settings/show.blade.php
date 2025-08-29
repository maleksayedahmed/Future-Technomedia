@extends('admin.layouts.app')

@section('title', 'Setting Details')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Setting: {{ $setting->label }}</h1>
            <div>
                <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-primary me-2">
                    <i class="fas fa-edit me-2"></i>Edit Setting
                </a>
                <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Settings
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>Setting Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Key:</strong></div>
                    <div class="col-sm-9"><code>{{ $setting->key }}</code></div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Label:</strong></div>
                    <div class="col-sm-9">{{ $setting->label }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Type:</strong></div>
                    <div class="col-sm-9">
                        <span class="badge bg-primary">{{ ucfirst($setting->type) }}</span>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Group:</strong></div>
                    <div class="col-sm-9">
                        <span class="badge bg-secondary">{{ ucfirst($setting->group) }}</span>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Order:</strong></div>
                    <div class="col-sm-9">{{ $setting->order }}</div>
                </div>
                
                @if($setting->description)
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Description:</strong></div>
                    <div class="col-sm-9">{{ $setting->description }}</div>
                </div>
                @endif
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Value:</strong></div>
                    <div class="col-sm-9">
                        @if($setting->type === 'image')
                            @if($setting->hasMedia('images'))
                                <img src="{{ $setting->getFirstMediaUrl('images') }}" 
                                     alt="{{ $setting->label }}" 
                                     class="img-thumbnail" 
                                     style="max-width: 300px; max-height: 200px;">
                            @else
                                <span class="text-muted">No image uploaded</span>
                            @endif
                        @elseif($setting->type === 'boolean')
                            <span class="badge bg-{{ $setting->value ? 'success' : 'danger' }}">
                                {{ $setting->value ? 'Enabled' : 'Disabled' }}
                            </span>
                        @elseif($setting->type === 'url')
                            @if($setting->value)
                                <a href="{{ $setting->value }}" target="_blank">{{ $setting->value }}</a>
                            @else
                                <span class="text-muted">No URL set</span>
                            @endif
                        @elseif($setting->type === 'textarea')
                            <div class="border p-3 bg-light rounded">
                                {{ $setting->value ?: 'No content' }}
                            </div>
                        @else
                            {{ $setting->value ?: 'No value set' }}
                        @endif
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Created:</strong></div>
                    <div class="col-sm-9">{{ $setting->created_at->format('M d, Y H:i') }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3"><strong>Updated:</strong></div>
                    <div class="col-sm-9">{{ $setting->updated_at->format('M d, Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0">
                    <i class="fas fa-tools me-2"></i>Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Setting
                    </a>
                    
                    <form action="{{ route('admin.settings.destroy', $setting) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this setting? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Setting
                        </button>
                    </form>
                    
                    <a href="{{ route('admin.settings.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Create New Setting
                    </a>
                    
                    <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
                        <i class="fas fa-list me-2"></i>All Settings
                    </a>
                </div>
            </div>
        </div>
        
        @if($setting->type === 'image' && $setting->hasMedia('images'))
        <div class="card mt-3">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0">
                    <i class="fas fa-image me-2"></i>Image Preview
                </h5>
            </div>
            <div class="card-body text-center">
                <img src="{{ $setting->getFirstMediaUrl('images') }}" 
                     alt="{{ $setting->label }}" 
                     class="img-fluid rounded">
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
