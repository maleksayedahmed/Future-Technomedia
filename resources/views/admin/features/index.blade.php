@extends('admin.layouts.app')

@section('title', 'Features')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Features Management</h1>
            <a href="{{ route('admin.features.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Feature
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0">
                    <i class="fas fa-star me-2"></i>
                    All Features ({{ $features->count() }})
                </h5>
            </div>
            <div class="card-body">
                @if($features->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($features as $feature)
                                <tr>
                                    <td>
                                        @if($feature->icon)
                                            <i class="{{ $feature->icon }} fa-2x text-primary"></i>
                                        @else
                                            <i class="fas fa-star fa-2x text-muted"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $feature->title }}</strong>
                                    </td>
                                    <td>
                                        {{ Str::limit($feature->description, 60) }}
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $feature->order }}</span>
                                    </td>
                                    <td>
                                        @if($feature->is_active)
                                            <span class="badge badge-status bg-success">Active</span>
                                        @else
                                            <span class="badge badge-status bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.features.show', $feature) }}"
                                               class="btn btn-sm btn-outline-info"
                                               title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.features.edit', $feature) }}"
                                               class="btn btn-sm btn-outline-primary"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.features.destroy', $feature) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this feature?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-star fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No features found</h5>
                        <p class="text-muted">Start by creating your first feature</p>
                        <a href="{{ route('admin.features.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add Your First Feature
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
