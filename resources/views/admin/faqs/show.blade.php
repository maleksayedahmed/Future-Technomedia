@extends('admin.layouts.app')

@section('title', 'View FAQ')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">View FAQ</h1>
                <div>
                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to FAQs
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
                        <i class="fas fa-question-circle me-2"></i>
                        {{ Str::limit($faq->question, 60) }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-3">FAQ Details</h5>

                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td width="150"><strong>Question:</strong></td>
                                            <td>{{ $faq->question }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Answer:</strong></td>
                                            <td>{!! nl2br(e($faq->answer)) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Display Order:</strong></td>
                                            <td><span class="badge bg-secondary">{{ $faq->order }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status:</strong></td>
                                            <td>
                                                @if ($faq->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Created:</strong></td>
                                            <td>{{ $faq->created_at->format('M d, Y \a\t h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Updated:</strong></td>
                                            <td>{{ $faq->updated_at->format('M d, Y \a\t h:i A') }}</td>
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
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-2"></i>Edit FAQ
                        </a>

                        @if ($faq->is_active)
                            <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="question" value="{{ $faq->question }}">
                                <input type="hidden" name="answer" value="{{ $faq->answer }}">
                                <input type="hidden" name="order" value="{{ $faq->order }}">
                                <button type="submit" class="btn btn-warning w-100">
                                    <i class="fas fa-pause me-2"></i>Deactivate
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="question" value="{{ $faq->question }}">
                                <input type="hidden" name="answer" value="{{ $faq->answer }}">
                                <input type="hidden" name="order" value="{{ $faq->order }}">
                                <input type="hidden" name="is_active" value="1">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-play me-2"></i>Activate
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this FAQ? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash me-2"></i>Delete FAQ
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
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button">
                                    <strong>{{ Str::limit($faq->question, 40) }}</strong>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    {!! Str::limit(strip_tags($faq->answer), 100) !!}
                                    @if (strlen(strip_tags($faq->answer)) > 100)
                                        <em>... (truncated for preview)</em>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted d-block mt-2">This is how it will appear on the website</small>
                </div>
            </div>
        </div>
    </div>
@endsection
