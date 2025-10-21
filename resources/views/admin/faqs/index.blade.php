@extends('admin.layouts.app')

@section('title', 'FAQs')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">FAQs Management</h1>
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New FAQ
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-question-circle me-2"></i>
                        All FAQs ({{ $faqs->count() }})
                    </h5>
                </div>
                <div class="card-body">
                    @if ($faqs->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer Preview</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $faq)
                                        <tr>
                                            <td>
                                                <strong class="text-primary">{{ Str::limit($faq->question, 50) }}</strong>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-muted">{{ Str::limit(strip_tags($faq->answer), 80) }}</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">{{ $faq->order }}</span>
                                            </td>
                                            <td>
                                                @if ($faq->is_active)
                                                    <span class="badge badge-status bg-success">Active</span>
                                                @else
                                                    <span class="badge badge-status bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.faqs.show', $faq) }}"
                                                        class="btn btn-sm btn-outline-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.faqs.edit', $faq) }}"
                                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
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
                            <i class="fas fa-question-circle fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No FAQs found</h5>
                            <p class="text-muted">Start by creating your first FAQ</p>
                            <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add Your First FAQ
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
