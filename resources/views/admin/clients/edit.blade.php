@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Client</h1>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Clients
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Client Information</h6>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.clients.update', $client) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Client Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ old('name', $client->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Display Order <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                                           id="order" name="order" value="{{ old('order', $client->order) }}" min="0" required>
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="website_url" class="form-label">Website URL</label>
                            <input type="url" class="form-control @error('website_url') is-invalid @enderror"
                                   id="website_url" name="website_url" value="{{ old('website_url', $client->website_url) }}"
                                   placeholder="https://example.com">
                            @error('website_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Client Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                   id="logo" name="logo" accept="image/*">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Leave empty to keep current logo. Upload logo image (JPEG, PNG, JPG, GIF, SVG). Recommended size: 400x200px. Max size: 2MB</div>
                        </div>

                        @if($client->getFirstMedia('logo'))
                            <div class="mb-3">
                                <label class="form-label">Current Logo</label>
                                <div>
                                    <img src="{{ $client->getFirstMedia('logo')->getUrl('thumb') }}"
                                         alt="{{ $client->name }}"
                                         class="img-thumbnail" style="max-width: 200px; height: auto;">
                                </div>
                            </div>
                        @endif

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                       {{ old('is_active', $client->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active (Display on website)
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary me-md-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Client
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Client Details</h6>
                </div>
                <div class="card-body">
                    <p><strong>Created:</strong> {{ $client->created_at->format('M d, Y \a\t g:i A') }}</p>
                    <p><strong>Last Updated:</strong> {{ $client->updated_at->format('M d, Y \a\t g:i A') }}</p>
                    <p><strong>Status:</strong>
                        @if($client->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </p>
                </div>
            </div>

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tips</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning"></i>
                            <strong>Logo:</strong> Use transparent PNG for best results
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning"></i>
                            <strong>Size:</strong> Recommended dimensions 400x200px
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning"></i>
                            <strong>Order:</strong> Lower numbers appear first
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning"></i>
                            <strong>Website:</strong> Include full URL with https://
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
