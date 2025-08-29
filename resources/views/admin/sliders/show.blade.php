@extends('admin.layouts.app')

@section('title', 'View Slider')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">View Slider</h1>
            <div>
                <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-primary me-2">
                    <i class="fas fa-edit me-2"></i>Edit
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
                    <i class="fas fa-image me-2"></i>
                    {{ $slider->title }}
                </h5>
            </div>
            <div class="card-body">
                @if($slider->getFirstMediaUrl('slider_images'))
                    <div class="mb-4">
                        <img src="{{ $slider->getFirstMediaUrl('slider_images') }}"
                             alt="{{ $slider->title }}"
                             class="img-fluid rounded"
                             style="width: 100%; max-height: 400px; object-fit: cover;">
                    </div>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded mb-4" style="height: 300px;">
                        <div class="text-center">
                            <i class="fas fa-image fa-3x text-muted mb-2"></i>
                            <p class="text-muted">No image uploaded</p>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="mb-3">Slider Details</h5>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td width="150"><strong>Title:</strong></td>
                                        <td>{{ $slider->title }}</td>
                                    </tr>
                                    @if($slider->description)
                                    <tr>
                                        <td><strong>Description:</strong></td>
                                        <td>{{ $slider->description }}</td>
                                    </tr>
                                    @endif
                                    @if($slider->button_text)
                                    <tr>
                                        <td><strong>Button Text:</strong></td>
                                        <td>{{ $slider->button_text }}</td>
                                    </tr>
                                    @endif
                                    @if($slider->button_link)
                                    <tr>
                                        <td><strong>Button Link:</strong></td>
                                        <td>
                                            <a href="{{ $slider->button_link }}" target="_blank" class="text-decoration-none">
                                                {{ $slider->button_link }}
                                                <i class="fas fa-external-link-alt ms-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td><strong>Display Order:</strong></td>
                                        <td><span class="badge bg-secondary">{{ $slider->order }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            @if($slider->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Created:</strong></td>
                                        <td>{{ $slider->created_at->format('M d, Y \a\t h:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Last Updated:</strong></td>
                                        <td>{{ $slider->updated_at->format('M d, Y \a\t h:i A') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
                    <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Slider
                    </a>

                    @if($slider->is_active)
                        <form action="{{ route('admin.sliders.update', $slider) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="title" value="{{ $slider->title }}">
                            <input type="hidden" name="description" value="{{ $slider->description }}">
                            <input type="hidden" name="button_text" value="{{ $slider->button_text }}">
                            <input type="hidden" name="button_link" value="{{ $slider->button_link }}">
                            <input type="hidden" name="order" value="{{ $slider->order }}">
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="fas fa-pause me-2"></i>Deactivate
                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.sliders.update', $slider) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="title" value="{{ $slider->title }}">
                            <input type="hidden" name="description" value="{{ $slider->description }}">
                            <input type="hidden" name="button_text" value="{{ $slider->button_text }}">
                            <input type="hidden" name="button_link" value="{{ $slider->button_link }}">
                            <input type="hidden" name="order" value="{{ $slider->order }}">
                            <input type="hidden" name="is_active" value="1">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-play me-2"></i>Activate
                            </button>
                        </form>
                    @endif

                    <form action="{{ route('admin.sliders.destroy', $slider) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this slider? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Slider
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if($slider->getFirstMediaUrl('slider_images'))
        <div class="card mt-3">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Image Information
                </h5>
            </div>
            <div class="card-body">
                @php
                    $media = $slider->getFirstMedia('slider_images');
                @endphp
                @if($media)
                    <div class="small">
                        <div class="mb-2">
                            <strong>File Name:</strong><br>
                            {{ $media->name }}
                        </div>
                        <div class="mb-2">
                            <strong>File Size:</strong><br>
                            {{ $media->human_readable_size }}
                        </div>
                        <div class="mb-2">
                            <strong>MIME Type:</strong><br>
                            {{ $media->mime_type }}
                        </div>
                        <div class="mb-2">
                            <strong>Uploaded:</strong><br>
                            {{ $media->created_at->format('M d, Y') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
