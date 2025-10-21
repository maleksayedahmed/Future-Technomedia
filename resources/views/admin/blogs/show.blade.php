@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blog Post Details</h1>
            <div>
                <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-warning me-2">
                    <i class="fas fa-edit"></i> Edit Post
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Blog Posts
                </a>
            </div>
        </div>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $blog->title }}</h6>
                        <span
                            class="badge {{ $blog->status === 'published' ? 'bg-success' : ($blog->status === 'draft' ? 'bg-warning' : 'bg-secondary') }}">
                            {{ ucfirst($blog->status) }}
                        </span>
                    </div>
                    <div class="card-body">
                        @if ($blog->featured_image)
                            <div class="mb-4 text-center">
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                                    class="img-fluid rounded" style="max-height: 300px;">
                            </div>
                        @endif

                        @if ($blog->excerpt)
                            <div class="mb-4">
                                <h5>Excerpt:</h5>
                                <p class="text-muted">{{ $blog->excerpt }}</p>
                            </div>
                        @endif

                        <div class="mb-4">
                            <h5>Content:</h5>
                            <div class="border rounded p-3 bg-light">
                                {!! $blog->content !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
                @if ($blog->meta_title || $blog->meta_description || $blog->meta_keywords)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
                        </div>
                        <div class="card-body">
                            @if ($blog->meta_title)
                                <div class="mb-3">
                                    <strong>Meta Title:</strong>
                                    <p class="mb-0">{{ $blog->meta_title }}</p>
                                    <small class="text-muted">Length: {{ strlen($blog->meta_title) }} characters</small>
                                </div>
                            @endif

                            @if ($blog->meta_description)
                                <div class="mb-3">
                                    <strong>Meta Description:</strong>
                                    <p class="mb-0">{{ $blog->meta_description }}</p>
                                    <small class="text-muted">Length: {{ strlen($blog->meta_description) }}
                                        characters</small>
                                </div>
                            @endif

                            @if ($blog->meta_keywords)
                                <div class="mb-3">
                                    <strong>Meta Keywords:</strong>
                                    <p class="mb-0">{{ $blog->meta_keywords }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Post Information -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Post Information</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <tr>
                                <td><strong>Author:</strong></td>
                                <td>{{ $blog->author->name ?? 'Unknown' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>
                                    <span
                                        class="badge {{ $blog->status === 'published' ? 'bg-success' : ($blog->status === 'draft' ? 'bg-warning' : 'bg-secondary') }}">
                                        {{ ucfirst($blog->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Published:</strong></td>
                                <td>
                                    @if ($blog->published_at)
                                        {{ $blog->published_at->format('M d, Y \a\t H:i') }}
                                    @else
                                        <span class="text-muted">Not published</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Created:</strong></td>
                                <td>{{ $blog->created_at->format('M d, Y \a\t H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Updated:</strong></td>
                                <td>{{ $blog->updated_at->format('M d, Y \a\t H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Featured:</strong></td>
                                <td>
                                    @if ($blog->is_featured)
                                        <span class="badge bg-warning"><i class="fas fa-star"></i> Yes</span>
                                    @else
                                        <span class="text-muted">No</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Views:</strong></td>
                                <td>{{ number_format($blog->view_count) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Comments:</strong></td>
                                <td>{{ number_format($blog->comment_count) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Reading Time:</strong></td>
                                <td>{{ $blog->reading_time }} minutes</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Categories -->
                @if ($blog->categories->count() > 0)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                        </div>
                        <div class="card-body">
                            @foreach ($blog->categories as $category)
                                <span class="badge bg-info me-1 mb-1">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Tags -->
                @if ($blog->tags->count() > 0)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tags</h6>
                        </div>
                        <div class="card-body">
                            @foreach ($blog->tags as $tag)
                                <span class="badge bg-secondary me-1 mb-1">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Actions -->
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn-outline-info" target="_blank">
                                <i class="fas fa-eye"></i> View Public Post
                            </a>
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit Post
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this blog post? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fas fa-trash"></i> Delete Post
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
