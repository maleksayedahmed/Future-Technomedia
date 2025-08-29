@extends('admin.layouts.app')

@section('title', 'View Feature')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">View Feature</h1>
            <div>
                <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-primary me-2">
                    <i class="fas fa-edit me-2"></i>Edit
                </a>
                <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Features
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
                    @if($feature->icon)
                        <i class="{{ $feature->icon }} me-2"></i>
                    @else
                        <i class="fas fa-star me-2"></i>
                    @endif
                    {{ $feature->title }}
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="mb-3">Feature Details</h5>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td width="150"><strong>Title:</strong></td>
                                        <td>{{ $feature->title }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Description:</strong></td>
                                        <td>{{ $feature->description }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Icon:</strong></td>
                                        <td>
                                            @if($feature->icon)
                                                <i class="{{ $feature->icon }} fa-2x text-primary me-2"></i>
                                                <code>{{ $feature->icon }}</code>
                                            @else
                                                <span class="text-muted">No icon set</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Display Order:</strong></td>
                                        <td><span class="badge bg-secondary">{{ $feature->order }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            @if($feature->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Created:</strong></td>
                                        <td>{{ $feature->created_at->format('M d, Y \a\t h:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Last Updated:</strong></td>
                                        <td>{{ $feature->updated_at->format('M d, Y \a\t h:i A') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @if($feature->icon)
                <div class="row mt-4">
                    <div class="col-12">
                        <h5 class="mb-3">Icon Preview</h5>
                        <div class="p-4 bg-light rounded text-center">
                            <i class="{{ $feature->icon }}" style="font-size: 4rem; color: #007bff;"></i>
                            <p class="mt-2 mb-0 text-muted">{{ $feature->icon }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0">
                    <i class="fas fa-cogs me-2"></i>
                    Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Feature
                    </a>

                    @if($feature->is_active)
                        <form action="{{ route('admin.features.update', $feature) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="title" value="{{ $feature->title }}">
                            <input type="hidden" name="description" value="{{ $feature->description }}">
                            <input type="hidden" name="icon" value="{{ $feature->icon }}">
                            <input type="hidden" name="order" value="{{ $feature->order }}">
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="fas fa-pause me-2"></i>Deactivate
                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.features.update', $feature) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="title" value="{{ $feature->title }}">
                            <input type="hidden" name="description" value="{{ $feature->description }}">
                            <input type="hidden" name="icon" value="{{ $feature->icon }}">
                            <input type="hidden" name="order" value="{{ $feature->order }}">
                            <input type="hidden" name="is_active" value="1">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-play me-2"></i>Activate
                            </button>
                        </form>
                    @endif

                    <form action="{{ route('admin.features.destroy', $feature) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this feature? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Feature
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0">
                    <i class="fas fa-eye me-2"></i>
                    Frontend Preview
                </h5>
            </div>
            <div class="card-body">
                <div class="border rounded p-3">
                    <div class="text-center mb-3">
                        @if($feature->icon)
                            <i class="{{ $feature->icon }}" style="font-size: 2rem; color: #007bff;"></i>
                        @else
                            <i class="fas fa-star" style="font-size: 2rem; color: #6c757d;"></i>
                        @endif
                    </div>
                    <h6 class="text-center mb-2">{{ $feature->title }}</h6>
                    <p class="text-muted text-center mb-0 small">{{ $feature->description }}</p>
                </div>
                <small class="text-muted d-block mt-2">This is how it will appear on the website</small>
            </div>
        </div>
    </div>
</div>
@endsection
