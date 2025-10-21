@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blog Management</h1>
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Blog Post
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Filters -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Filters</h6>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('admin.blogs.index') }}" class="row g-3">
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published
                            </option>
                            <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>Archived
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" name="search" id="search" class="form-control"
                            placeholder="Search by title..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Clear
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blog Posts ({{ $blogs->total() }})</h6>
            </div>
            <div class="card-body">
                @if ($blogs->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Categories</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th>Published</th>
                                    <th>Featured</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if ($blog->featured_image)
                                                    <img src="{{ asset('storage/' . $blog->featured_image) }}"
                                                        alt="{{ $blog->title }}"
                                                        style="width: 50px; height: 35px; object-fit: cover; margin-right: 10px;">
                                                @endif
                                                <div>
                                                    <strong>{{ Str::limit($blog->title, 50) }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $blog->slug }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $blog->author->name ?? 'Unknown' }}</td>
                                        <td>
                                            @foreach ($blog->categories as $category)
                                                <span class="badge bg-info">{{ $category->name }}</span>
                                            @endforeach
                                            @if ($blog->categories->isEmpty())
                                                <span class="badge bg-secondary">Uncategorized</span>
                                            @endif
                                        </td>
                                        <td>
                                            <select class="form-select form-select-sm status-select"
                                                data-url="{{ route('admin.blogs.change-status', $blog) }}"
                                                style="width: auto;">
                                                <option value="draft" {{ $blog->status === 'draft' ? 'selected' : '' }}>
                                                    Draft</option>
                                                <option value="published"
                                                    {{ $blog->status === 'published' ? 'selected' : '' }}>Published
                                                </option>
                                                <option value="archived"
                                                    {{ $blog->status === 'archived' ? 'selected' : '' }}>Archived</option>
                                            </select>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ number_format($blog->view_count) }}</span>
                                        </td>
                                        <td>
                                            @if ($blog->published_at)
                                                {{ $blog->published_at->format('M d, Y') }}
                                            @else
                                                <span class="text-muted">Not published</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button
                                                class="btn btn-sm {{ $blog->is_featured ? 'btn-warning' : 'btn-outline-warning' }} featured-toggle"
                                                data-url="{{ route('admin.blogs.toggle-featured', $blog) }}">
                                                <i class="fas fa-star"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.blogs.show', $blog) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.blogs.edit', $blog) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this blog post?');">
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
                        {{ $blogs->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No blog posts found</h5>
                        <p class="text-muted">Start by creating your first blog post.</p>
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add New Blog Post
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle status change
            document.querySelectorAll('.status-select').forEach(select => {
                select.addEventListener('change', function() {
                    const url = this.dataset.url;
                    const status = this.value;

                    fetch(url, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                status: status
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Show success message
                                const alert = document.createElement('div');
                                alert.className =
                                    'alert alert-success alert-dismissible fade show position-fixed';
                                alert.style.cssText =
                                    'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
                                alert.innerHTML = `
                        ${data.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                                document.body.appendChild(alert);

                                setTimeout(() => {
                                    alert.remove();
                                }, 3000);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            // Reset select on error
                            location.reload();
                        });
                });
            });

            // Handle featured toggle
            document.querySelectorAll('.featured-toggle').forEach(button => {
                button.addEventListener('click', function() {
                    const url = this.dataset.url;

                    fetch(url, {
                            method: 'PATCH',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Toggle button appearance
                                this.classList.toggle('btn-warning');
                                this.classList.toggle('btn-outline-warning');

                                // Show success message
                                const alert = document.createElement('div');
                                alert.className =
                                    'alert alert-success alert-dismissible fade show position-fixed';
                                alert.style.cssText =
                                    'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
                                alert.innerHTML = `
                        ${data.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                                document.body.appendChild(alert);

                                setTimeout(() => {
                                    alert.remove();
                                }, 3000);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            location.reload();
                        });
                });
            });
        });
    </script>
@endsection
