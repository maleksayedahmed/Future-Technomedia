@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Testimonials Management</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Testimonial
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Testimonials List</h6>
        </div>
        <div class="card-body">
            @if($testimonials->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Rating</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $testimonial)
                                <tr>
                                    <td>
                                        @if($testimonial->getFirstMedia('avatar'))
                                            <img src="{{ $testimonial->getFirstMedia('avatar')->getUrl('thumb') }}"
                                                 alt="{{ $testimonial->name }}"
                                                 style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center rounded-circle"
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-user text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->position }}</td>
                                    <td>{{ $testimonial->company ?? 'N/A' }}</td>
                                    <td>
                                        <div class="text-warning">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $testimonial->rating)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </td>
                                    <td>{{ $testimonial->order }}</td>
                                    <td>
                                        @if($testimonial->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.testimonials.show', $testimonial) }}"
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                               class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
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

                <div class="d-flex justify-content-center">
                    {{ $testimonials->links() }}
                </div>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No testimonials found</h5>
                    <p class="text-muted">Start by creating your first testimonial.</p>
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Testimonial
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
