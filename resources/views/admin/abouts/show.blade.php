@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">View About Content</h1>
            <div>
                <a href="{{ route('admin.abouts.edit', $about) }}" class="btn btn-warning me-2">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to About Content
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hero Section</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Title:</strong> {{ $about->hero_title ?? 'Not set' }}</p>
                                <p><strong>Subtitle:</strong> {{ $about->hero_subtitle ?? 'Not set' }}</p>
                            </div>
                            <div class="col-md-6">
                                @if ($about->getFirstMedia('hero_background'))
                                    <p><strong>Background Image:</strong></p>
                                    <img src="{{ $about->getFirstMedia('hero_background')->getUrl('medium') }}"
                                        alt="Hero Background" class="img-fluid rounded">
                                @else
                                    <p><strong>Background Image:</strong> No image uploaded</p>
                                @endif
                            </div>
                        </div>
                        <p><strong>Description:</strong></p>
                        <p>{{ $about->hero_description ?? 'Not set' }}</p>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Services Section</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Title:</strong> {{ $about->services_title ?? 'Not set' }}</p>
                                <p><strong>Subtitle:</strong> {{ $about->services_subtitle ?? 'Not set' }}</p>
                            </div>
                        </div>

                        @if ($about->services && is_array($about->services))
                            <h6 class="mt-3">Services List:</h6>
                            <div class="row">
                                @foreach ($about->services as $service)
                                    <div class="col-md-6 mb-3">
                                        <div class="border rounded p-3">
                                            <h6>{{ $service['title'] ?? 'Untitled' }}</h6>
                                            <p><strong>Icon:</strong> {{ $service['icon'] ?? 'Not set' }}</p>
                                            <p><strong>Description:</strong> {{ $service['description'] ?? 'Not set' }}</p>
                                            @if (isset($service['features']) && is_array($service['features']))
                                                <p><strong>Features:</strong></p>
                                                <ul>
                                                    @foreach ($service['features'] as $feature)
                                                        <li>{{ $feature }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            @if (isset($service['image_url']))
                                                <p><strong>Image URL:</strong> <a href="{{ $service['image_url'] }}"
                                                        target="_blank">{{ $service['image_url'] }}</a></p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No services configured.</p>
                        @endif
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Video Section</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Title:</strong> {{ $about->video_title ?? 'Not set' }}</p>
                                <p><strong>Button Text:</strong> {{ $about->video_button_text ?? 'Not set' }}</p>
                                <p><strong>Button URL:</strong> {{ $about->video_button_url ?? 'Not set' }}</p>
                            </div>
                            <div class="col-md-6">
                                @if ($about->getFirstMedia('video_thumbnail'))
                                    <p><strong>Thumbnail:</strong></p>
                                    <img src="{{ $about->getFirstMedia('video_thumbnail')->getUrl('medium') }}"
                                        alt="Video Thumbnail" class="img-fluid rounded">
                                @else
                                    <p><strong>Thumbnail:</strong> No image uploaded</p>
                                @endif
                            </div>
                        </div>
                        <p><strong>Description:</strong></p>
                        <p>{{ $about->video_description ?? 'Not set' }}</p>

                        @if ($about->getFirstMedia('presentation_video'))
                            <p><strong>Video File:</strong></p>
                            <video controls class="w-100" style="max-height: 300px;">
                                <source src="{{ $about->getFirstMediaUrl('presentation_video') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <p><strong>Video File:</strong> No video uploaded</p>
                        @endif
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Call-to-Action Section</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Title:</strong> {{ $about->cta_title ?? 'Not set' }}</p>
                        <p><strong>Button Text:</strong> {{ $about->cta_button_text ?? 'Not set' }}</p>
                        <p><strong>Button URL:</strong> {{ $about->cta_button_url ?? 'Not set' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Status:</strong>
                            @if ($about->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </p>
                        <p><strong>Order:</strong> {{ $about->order }}</p>
                        <p><strong>Created:</strong> {{ $about->created_at->format('M d, Y H:i') }}</p>
                        <p><strong>Updated:</strong> {{ $about->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>

                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.abouts.edit', $about) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit Content
                            </a>
                            <form action="{{ route('admin.abouts.destroy', $about) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this about content? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Delete Content
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
