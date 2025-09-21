@extends('admin.layouts.app')

@section('title', 'View Fact')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">View Fact</h1>
                <div>
                    <a href="{{ route('admin.facts.edit', $fact) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.facts.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Facts
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
                        <i class="fas fa-chart-line me-2"></i>
                        {{ $fact->label }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Fact Details</h5>

                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        @if ($fact->title)
                                            <tr>
                                                <td width="150"><strong>Section Title:</strong></td>
                                                <td>{{ $fact->title }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td width="150"><strong>Number:</strong></td>
                                            <td>
                                                <span class="h4 text-primary">{{ number_format($fact->number) }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Label:</strong></td>
                                            <td>{{ $fact->label }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Display Order:</strong></td>
                                            <td><span class="badge bg-secondary">{{ $fact->order }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status:</strong></td>
                                            <td>
                                                @if ($fact->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Created:</strong></td>
                                            <td>{{ $fact->created_at->format('M d, Y \a\t h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Updated:</strong></td>
                                            <td>{{ $fact->updated_at->format('M d, Y \a\t h:i A') }}</td>
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
                        <a href="{{ route('admin.facts.edit', $fact) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Edit Fact
                        </a>

                        @if ($fact->is_active)
                            <form action="{{ route('admin.facts.update', $fact) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $fact->title }}">
                                <input type="hidden" name="number" value="{{ $fact->number }}">
                                <input type="hidden" name="label" value="{{ $fact->label }}">
                                <input type="hidden" name="order" value="{{ $fact->order }}">
                                <button type="submit" class="btn btn-warning w-100">
                                    <i class="fas fa-pause me-2"></i>Deactivate
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.facts.update', $fact) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $fact->title }}">
                                <input type="hidden" name="number" value="{{ $fact->number }}">
                                <input type="hidden" name="label" value="{{ $fact->label }}">
                                <input type="hidden" name="order" value="{{ $fact->order }}">
                                <input type="hidden" name="is_active" value="1">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-play me-2"></i>Activate
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('admin.facts.destroy', $fact) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this fact? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash me-2"></i>Delete Fact
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-eye me-2"></i>
                        Frontend Preview
                    </h5>
                </div>
                <div class="card-body">
                    <div class="border rounded p-3">
                        <div class="text-center">
                            <div class="milestone-counter mb-2">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="{{ $fact->number }}">
                                        {{ $fact->number }}</div>
                                </div>
                            </div>
                            <h6>{{ $fact->label }}</h6>
                            @if ($fact->title)
                                <div class="small text-info mt-2">{{ $fact->title }}</div>
                            @endif
                        </div>
                    </div>
                    <small class="text-muted d-block mt-2">This is how it will appear on the website</small>
                </div>
            </div>
        </div>
    </div>
@endsection
