@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Client Details</h1>
        <div>
            <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Clients
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $client->name }}</h6>
                </div>
                <div class="card-body">
                    @if($client->getFirstMedia('logo'))
                        <div class="mb-4 text-center">
                            <img src="{{ $client->getFirstMedia('logo')->getUrl() }}"
                                 alt="{{ $client->name }}"
                                 class="img-fluid shadow" style="max-width: 400px; height: auto;">
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Client Name:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $client->name }}
                        </div>
                    </div>

                    @if($client->website_url)
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Website:</strong>
                            </div>
                            <div class="col-sm-9">
                                <a href="{{ $client->website_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt"></i> Visit Website
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Display Order:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $client->order }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Status:</strong>
                        </div>
                        <div class="col-sm-9">
                            @if($client->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Client Information</h6>
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <strong>Created:</strong><br>
                        {{ $client->created_at->format('M d, Y \a\t g:i A') }}
                    </p>
                    <p class="mb-2">
                        <strong>Last Updated:</strong><br>
                        {{ $client->updated_at->format('M d, Y \a\t g:i A') }}
                    </p>
                    @if($client->getFirstMedia('logo'))
                        <p class="mb-2">
                            <strong>Logo Size:</strong><br>
                            {{ number_format($client->getFirstMedia('logo')->size / 1024, 2) }} KB
                        </p>
                    @endif
                </div>
            </div>

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Client
                        </a>
                        @if($client->website_url)
                            <a href="{{ $client->website_url }}" target="_blank" class="btn btn-outline-primary">
                                <i class="fas fa-external-link-alt"></i> Visit Website
                            </a>
                        @endif
                        <form action="{{ route('admin.clients.destroy', $client) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this client? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Delete Client
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
