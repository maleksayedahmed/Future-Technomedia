@extends('admin.layouts.app')

@section('title', 'Fact Sections')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Fact Sections Management</h1>
                <a href="{{ route('admin.fact-sections.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New Section
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-layer-group me-2"></i>
                        All Fact Sections ({{ $factSections->count() }})
                    </h5>
                </div>
                <div class="card-body">
                    @if ($factSections->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Background</th>
                                        <th>Facts Count</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($factSections as $section)
                                        <tr>
                                            <td>
                                                <strong>{{ $section->title ?? 'Untitled' }}</strong>
                                            </td>
                                            <td>
                                                <span class="text-muted">{{ $section->subtitle ?? '-' }}</span>
                                            </td>
                                            <td>
                                                @if ($section->hasMedia('background_images'))
                                                    <img src="{{ $section->getFirstMediaUrl('background_images', 'thumb') }}"
                                                        alt="Background" class="img-thumbnail"
                                                        style="width: 60px; height: 40px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge bg-info">{{ $section->facts->count() }}</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">{{ $section->order }}</span>
                                            </td>
                                            <td>
                                                @if ($section->is_active)
                                                    <span class="badge badge-status bg-success">Active</span>
                                                @else
                                                    <span class="badge badge-status bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.fact-sections.show', $section) }}"
                                                        class="btn btn-sm btn-outline-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.fact-sections.edit', $section) }}"
                                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.fact-sections.destroy', $section) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this section? This will also delete all associated facts.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
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
                            <i class="fas fa-layer-group fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No fact sections found</h5>
                            <p class="text-muted">Start by creating your first fact section</p>
                            <a href="{{ route('admin.fact-sections.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add Your First Section
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
