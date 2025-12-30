@extends('admin.layouts.app')

@section('title', 'Create Menu Item')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Create Menu Item</h1>
                <a href="{{ route('admin.menu-items.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.menu-items.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-plus-circle me-2"></i> Item Details
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- Title --}}
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            {{-- Order --}}
                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">Display Order</label>
                                <input type="number" name="order" id="order" class="form-control" value="{{ old('order', 0) }}">
                                <small class="text-muted">Lower numbers appear first.</small>
                            </div>

                            {{-- Route Name --}}
                            <div class="col-md-6 mb-3">
                                <label for="route" class="form-label">Laravel Route Name</label>
                                <input type="text" name="route" id="route" class="form-control" value="{{ old('route') }}" placeholder="e.g. projects.index">
                                <small class="text-muted">Use this OR the Custom URL below.</small>
                            </div>

                            {{-- Custom URL --}}
                            <div class="col-md-6 mb-3">
                                <label for="url" class="form-label">Custom URL</label>
                                <input type="text" name="url" id="url" class="form-control" value="{{ old('url') }}" placeholder="e.g. /my-page or https://google.com">
                            </div>

                            {{-- Is Active --}}
                            <div class="col-md-12 mb-3">
                                <div class="form-check form-switch">
                                    <input type="hidden" name="is_active" value="0">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                                    <label class="form-check-label" for="is_active">Enable this menu item</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-save me-2"></i> Create Menu Item
                </button>
            </div>
        </div>
    </form>
@endsection
