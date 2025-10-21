@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">About Page Management</h1>
            <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add About Content
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">About Content List</h6>
            </div>
            <div class="card-body">
                @if ($abouts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Hero Title</th>
                                    <th>Services Title</th>
                                    <th>Video Title</th>
                                    <th>Hero Background</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $about)
                                    <tr>
                                        <td>{{ $about->id }}</td>
                                        <td>{{ $about->hero_title ?? 'N/A' }}</td>
                                        <td>{{ $about->services_title ?? 'N/A' }}</td>
                                        <td>{{ $about->video_title ?? 'N/A' }}</td>
                                        <td>
                                            @if ($about->getFirstMedia('hero_background'))
                                                <img src="{{ $about->getFirstMedia('hero_background')->getUrl('thumb') }}"
                                                    alt="Hero Background"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center"
                                                    style="width: 50px; height: 50px;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($about->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $about->order }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.abouts.show', $about) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.abouts.edit', $about) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.abouts.destroy', $about) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this about content?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
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
                    <div class="text-center py-4">
                        <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No about content found</h5>
                        <p class="text-muted">Start by creating your about page content.</p>
                        <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add About Content
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
