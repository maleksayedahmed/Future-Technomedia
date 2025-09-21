@extends('admin.layouts.app')

@section('title', 'View Fact Section')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">View Fact Section</h1>
                <div>
                    <a href="{{ route('admin.fact-sections.edit', $factSection) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.fact-sections.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Sections
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
                        <i class="fas fa-layer-group me-2"></i>
                        {{ $factSection->title ?? 'Untitled Section' }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">Section Details</h5>

                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td width="150"><strong>Title:</strong></td>
                                            <td>{{ $factSection->title ?? 'Not set' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Subtitle:</strong></td>
                                            <td>{{ $factSection->subtitle ?? 'Not set' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Description:</strong></td>
                                            <td>{{ $factSection->description ?? 'Not set' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Background Image:</strong></td>
                                            <td>
                                                @if ($factSection->hasMedia('background_images'))
                                                    <img src="{{ $factSection->getFirstMediaUrl('background_images', 'medium') }}"
                                                        alt="Background" class="img-fluid rounded"
                                                        style="max-width: 300px;">
                                                @else
                                                    <span class="text-muted">No background image</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Display Order:</strong></td>
                                            <td><span class="badge bg-secondary">{{ $factSection->order }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status:</strong></td>
                                            <td>
                                                @if ($factSection->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Facts Count:</strong></td>
                                            <td><span class="badge bg-info">{{ $factSection->facts->count() }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Created:</strong></td>
                                            <td>{{ $factSection->created_at->format('M d, Y \a\t h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Updated:</strong></td>
                                            <td>{{ $factSection->updated_at->format('M d, Y \a\t h:i A') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if ($factSection->facts->count() > 0)
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5 class="mb-3">Facts in this Section</h5>
                                <div class="row g-3">
                                    @foreach ($factSection->facts as $fact)
                                        <div class="col-md-3">
                                            <div class="card h-100">
                                                <div class="card-body text-center">
                                                    <div class="h2 text-primary mb-2">{{ number_format($fact->number) }}
                                                    </div>
                                                    <div class="text-muted">{{ $fact->label }}</div>
                                                    <div class="mt-2">
                                                        @if ($fact->is_active)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactive</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
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
                        <a href="{{ route('admin.fact-sections.edit', $factSection) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Edit Section
                        </a>

                        @if ($factSection->is_active)
                            <form action="{{ route('admin.fact-sections.update', $factSection) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $factSection->title }}">
                                <input type="hidden" name="subtitle" value="{{ $factSection->subtitle }}">
                                <input type="hidden" name="description" value="{{ $factSection->description }}">
                                <input type="hidden" name="order" value="{{ $factSection->order }}">
                                <button type="submit" class="btn btn-warning w-100">
                                    <i class="fas fa-pause me-2"></i>Deactivate Section
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.fact-sections.update', $factSection) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $factSection->title }}">
                                <input type="hidden" name="subtitle" value="{{ $factSection->subtitle }}">
                                <input type="hidden" name="description" value="{{ $factSection->description }}">
                                <input type="hidden" name="order" value="{{ $factSection->order }}">
                                <input type="hidden" name="is_active" value="1">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-play me-2"></i>Activate Section
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('admin.facts.index', ['section' => $factSection->id]) }}"
                            class="btn btn-info w-100">
                            <i class="fas fa-chart-line me-2"></i>Manage Facts
                        </a>

                        <form action="{{ route('admin.fact-sections.destroy', $factSection) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this section? This will also delete all associated facts and cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash me-2"></i>Delete Section
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
                    <div class="border rounded p-3"
                        style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                        <div class="text-center mb-3">
                            <h4 class="mb-2">{{ $factSection->title ?? 'Section Title' }}</h4>
                            @if ($factSection->subtitle)
                                <div class="text-muted">{{ $factSection->subtitle }}</div>
                            @endif
                        </div>
                        @if ($factSection->facts->count() > 0)
                            <div class="row g-2 justify-content-center">
                                @foreach ($factSection->facts->take(4) as $fact)
                                    <div class="col-6 col-md-3">
                                        <div class="text-center p-2 bg-white rounded">
                                            <div class="h5 text-primary mb-1">{{ number_format($fact->number) }}</div>
                                            <small class="text-muted">{{ $fact->label }}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center text-muted">
                                <small>No facts to display</small>
                            </div>
                        @endif
                    </div>
                    <small class="text-muted d-block mt-2">This is how it will appear on the website</small>
                </div>
            </div>
        </div>
    </div>
@endsection
