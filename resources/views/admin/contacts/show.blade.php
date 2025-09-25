@extends('admin.layouts.app')

@section('title', 'Contact Message Details')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Contact Message Details</h1>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Messages
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-envelope me-2"></i>
                        Message from {{ $contact->name }}
                    </h5>
                    <div class="d-flex gap-2">
                        @if(!$contact->is_read)
                        <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-check me-1"></i>Mark as Read
                            </button>
                        </form>
                        @else
                        <form action="{{ route('admin.contacts.mark-unread', $contact) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-warning">
                                <i class="fas fa-undo me-1"></i>Mark as Unread
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('admin.contacts.destroy', $contact) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this message?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Contact Information</h6>
                        <div class="mb-3">
                            <strong>Name:</strong> {{ $contact->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong>
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </div>
                        @if($contact->phone)
                        <div class="mb-3">
                            <strong>Phone:</strong>
                            <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Message Details</h6>
                        @if($contact->subject)
                        <div class="mb-3">
                            <strong>Subject:</strong> {{ $contact->subject }}
                        </div>
                        @endif
                        <div class="mb-3">
                            <strong>Received:</strong> {{ $contact->created_at->format('F j, Y \a\t g:i A') }}
                        </div>
                        <div class="mb-3">
                            <strong>Status:</strong>
                            @if($contact->is_read)
                                <span class="badge bg-success">Read</span>
                            @else
                                <span class="badge bg-warning">Unread</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="text-muted mb-2">Message</h6>
                    <div class="bg-light p-3 rounded">
                        {!! nl2br(e($contact->message)) !!}
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-transparent">
                <h6 class="card-title mb-0">
                    <i class="fas fa-reply me-2"></i>Quick Actions
                </h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject ?? 'Your Contact Message' }}"
                       class="btn btn-primary">
                        <i class="fas fa-envelope me-2"></i>Reply via Email
                    </a>

                    @if($contact->phone)
                    <a href="tel:{{ $contact->phone }}" class="btn btn-info">
                        <i class="fas fa-phone me-2"></i>Call {{ $contact->name }}
                    </a>
                    @php
                        $waPhone = preg_replace('/\D+/', '', $contact->phone ?? '');
                        $waText = rawurlencode('Hello ' . ($contact->name ?? '') . ', I\'m following up regarding your message' . ($contact->subject ? ' about: ' . $contact->subject : ''));
                    @endphp
                    @if(!empty($waPhone))
                    <a href="https://wa.me/{{ $waPhone }}?text={{ $waText }}" target="_blank" rel="noopener noreferrer" class="btn btn-success">
                        <i class="fab fa-whatsapp me-2"></i>Chat on WhatsApp
                    </a>
                    @endif
                    @endif

                    <button type="button" class="btn btn-secondary" onclick="copyContactInfo()">
                        <i class="fas fa-copy me-2"></i>Copy Contact Info
                    </button>
                </div>

                <hr>

                <h6 class="mb-3">Message Statistics</h6>
                <small class="text-muted">
                    <div class="mb-2">
                        <strong>Message ID:</strong> #{{ $contact->id }}
                    </div>
                    <div class="mb-2">
                        <strong>Received:</strong> {{ $contact->created_at->diffForHumans() }}
                    </div>
                    <div class="mb-2">
                        <strong>Message Length:</strong> {{ strlen($contact->message) }} characters
                    </div>
                </small>
            </div>
        </div>
    </div>
</div>

<script>
function copyContactInfo() {
    const contactData = {
        name: {!! json_encode($contact->name ?? '') !!},
        email: {!! json_encode($contact->email ?? '') !!},
        phone: {!! json_encode($contact->phone ?? '') !!},
        subject: {!! json_encode($contact->subject ?? '') !!},
        message: {!! json_encode($contact->message ?? '') !!}
    };

    const lines = [
        `Name: ${contactData.name || ''}`,
        `Email: ${contactData.email || ''}`,
    ];
    if (contactData.phone) lines.push(`Phone: ${contactData.phone}`);
    if (contactData.subject) lines.push(`Subject: ${contactData.subject}`);
    lines.push('Message:');
    lines.push((contactData.message || '').toString());

    const contactInfo = lines.join('\n');

    navigator.clipboard.writeText(contactInfo).then(function() {
        alert('Contact information copied to clipboard!');
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}
</script>
@endsection
