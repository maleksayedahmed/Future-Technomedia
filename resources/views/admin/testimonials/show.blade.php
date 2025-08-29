@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Testimonial Details</h1>
        <div>
            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Testimonials
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $testimonial->name }}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            @if($testimonial->getFirstMedia('avatar'))
                                <img src="{{ $testimonial->getFirstMedia('avatar')->getUrl() }}"
                                     alt="{{ $testimonial->name }}"
                                     class="img-fluid rounded-circle shadow mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center rounded-circle shadow mb-3"
                                     style="width: 150px; height: 150px;">
                                    <i class="fas fa-user fa-3x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Position:</strong>
                                </div>
                                <div class="col-sm-9">
                                    {{ $testimonial->position }}
                                </div>
                            </div>

                            @if($testimonial->company)
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <strong>Company:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        {{ $testimonial->company }}
                                    </div>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Rating:</strong>
                                </div>
                                <div class="col-sm-9">
                                    <div class="text-warning">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $testimonial->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="ms-2">({{ $testimonial->rating }}/5)</span>
                                    </div>
                                </div>
                            </div>

                            @if($testimonial->platform)
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <strong>Platform:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="badge bg-info">{{ $testimonial->platform }}</span>
                                    </div>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Display Order:</strong>
                                </div>
                                <div class="col-sm-9">
                                    {{ $testimonial->order }}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <strong>Status:</strong>
                                </div>
                                <div class="col-sm-9">
                                    @if($testimonial->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h6><strong>Testimonial Message:</strong></h6>
                            <div class="bg-light p-3 rounded">
                                <blockquote class="blockquote mb-0">
                                    <p>"{{ $testimonial->message }}"</p>
                                    <footer class="blockquote-footer">
                                        {{ $testimonial->name }}
                                        @if($testimonial->company), {{ $testimonial->company }}@endif
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Testimonial Information</h6>
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <strong>Created:</strong><br>
                        {{ $testimonial->created_at->format('M d, Y \a\t g:i A') }}
                    </p>
                    <p class="mb-2">
                        <strong>Last Updated:</strong><br>
                        {{ $testimonial->updated_at->format('M d, Y \a\t g:i A') }}
                    </p>
                    @if($testimonial->getFirstMedia('avatar'))
                        <p class="mb-2">
                            <strong>Avatar Size:</strong><br>
                            {{ number_format($testimonial->getFirstMedia('avatar')->size / 1024, 2) }} KB
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
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Testimonial
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this testimonial? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Delete Testimonial
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
