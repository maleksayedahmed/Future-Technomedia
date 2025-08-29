@extends('admin.layouts.app')

@section('title', 'Sliders')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Sliders Management</h1>
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Slider
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0">
                    <i class="fas fa-images me-2"></i>
                    All Sliders ({{ $sliders->count() }})
                </h5>
            </div>
            <div class="card-body">
                @if($sliders->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                    <td>
                                        @if($slider->getFirstMediaUrl('slider_images'))
                                            <img src="{{ $slider->getFirstMediaUrl('slider_images', 'thumb') }}"
                                                 alt="{{ $slider->title }}"
                                                 class="image-preview">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center image-preview">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $slider->title }}</strong>
                                        @if($slider->button_text)
                                            <br><small class="text-muted">Button: {{ $slider->button_text }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if($slider->description)
                                            {{ Str::limit($slider->description, 50) }}
                                        @else
                                            <span class="text-muted">No description</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $slider->order }}</span>
                                    </td>
                                    <td>
                                        @if($slider->is_active)
                                            <span class="badge badge-status bg-success">Active</span>
                                        @else
                                            <span class="badge badge-status bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.sliders.show', $slider) }}"
                                               class="btn btn-sm btn-outline-info"
                                               title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.sliders.edit', $slider) }}"
                                               class="btn btn-sm btn-outline-primary"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.sliders.destroy', $slider) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this slider?')">
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
                        <i class="fas fa-images fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No sliders found</h5>
                        <p class="text-muted">Start by creating your first slider</p>
                        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add Your First Slider
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
