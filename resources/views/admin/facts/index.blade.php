@extends('admin.layouts.app')

@section('title', 'Facts')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Facts Management</h1>
                <a href="{{ route('admin.facts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New Fact
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-line me-2"></i>
                        All Facts ({{ $facts->count() }})
                    </h5>
                </div>
                <div class="card-body">
                    @if ($facts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Label</th>
                                        <th>Title</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($facts as $fact)
                                        <tr>
                                            <td>
                                                <strong class="text-primary">{{ number_format($fact->number) }}</strong>
                                            </td>
                                            <td>
                                                <strong>{{ $fact->label }}</strong>
                                            </td>
                                            <td>
                                                @if ($fact->title)
                                                    <span class="badge bg-info">{{ $fact->title }}</span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">{{ $fact->order }}</span>
                                            </td>
                                            <td>
                                                @if ($fact->is_active)
                                                    <span class="badge badge-status bg-success">Active</span>
                                                @else
                                                    <span class="badge badge-status bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.facts.show', $fact) }}"
                                                        class="btn btn-sm btn-outline-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.facts.edit', $fact) }}"
                                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.facts.destroy', $fact) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this fact?')">
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
                            <i class="fas fa-chart-line fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No facts found</h5>
                            <p class="text-muted">Start by creating your first fact</p>
                            <a href="{{ route('admin.facts.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add Your First Fact
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
