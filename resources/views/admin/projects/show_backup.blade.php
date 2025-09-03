@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Project Details</h1>
        <div>
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Projects
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $project->title }}</h6>
                </div>
                <div class="card-body">
                    @if($project->getFirstMedia('projects'))
                        <div class="mb-4">
                            <img src="{{ $project->getFirstMedia('projects')->getUrl() }}"
                                 alt="{{ $project->title }}"
                                 class="img-fluid rounded shadow">
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Category:</strong>
                        </div>
                        <div class="col-sm-9">
                            <span class="badge bg-info">{{ $project->category }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Description:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $project->description }}
                        </div>
                    </div>

                    @if($project->project_url)
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Project URL:</strong>
                            </div>
                            <div class="col-sm-9">
                                <a href="{{ $project->project_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt"></i> Visit Project
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Display Order:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $project->order }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Status:</strong>
                        </div>
                        <div class="col-sm-9">
                            @if($project->is_active)
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
                    <h6 class="m-0 font-weight-bold text-primary">Project Information</h6>
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <strong>Created:</strong><br>
                        {{ $project->created_at->format('M d, Y \a\t g:i A') }}
                    </p>
                    <p class="mb-2">
                        <strong>Last Updated:</strong><br>
                        {{ $project->updated_at->format('M d, Y \a\t g:i A') }}
                    </p>
                    @if($project->getFirstMedia('projects'))
                        <p class="mb-2">
                            <strong>Image Size:</strong><br>
                            {{ number_format($project->getFirstMedia('projects')->size / 1024, 2) }} KB
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
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Project
                        </a>
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" class="btn btn-outline-primary">
                                <i class="fas fa-external-link-alt"></i> View Live Project
                            </a>
                        @endif
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this project? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Delete Project
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
