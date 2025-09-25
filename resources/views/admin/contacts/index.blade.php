@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Contact Messages</h1>
            <div>
                <span class="badge bg-info me-2">Total: {{ $contacts->total() }}</span>
                <span class="badge bg-warning">Unread: {{ $contacts->where('is_read', false)->count() }}</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-envelope me-2"></i>
                        All Messages ({{ $contacts->total() }})
                    </h5>
                    @if($contacts->count() > 0)
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="toggleBulkActions()">
                            <i class="fas fa-check-square me-1"></i>Bulk Actions
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @if($contacts->count() > 0)
                    <form id="bulk-action-form" action="{{ route('admin.contacts.bulk-action') }}" method="POST" style="display: none;" class="mb-3">
                        @csrf
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <select name="action" class="form-select form-select-sm" required>
                                    <option value="">Select Action</option>
                                    <option value="mark_read">Mark as Read</option>
                                    <option value="mark_unread">Mark as Unread</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-sm btn-primary">Apply</button>
                                <button type="button" class="btn btn-sm btn-secondary" onclick="toggleBulkActions()">Cancel</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="40" id="bulk-checkbox-header" style="display: none;">
                                        <input type="checkbox" id="select-all" class="form-check-input">
                                    </th>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr class="{{ !$contact->is_read ? 'table-warning' : '' }}">
                                    <td class="bulk-checkbox-cell" style="display: none;">
                                        <input type="checkbox" name="contact_ids[]" value="{{ $contact->id }}" class="form-check-input contact-checkbox">
                                    </td>
                                    <td>
                                        @if($contact->is_read)
                                            <i class="fas fa-envelope-open text-muted" title="Read"></i>
                                        @else
                                            <i class="fas fa-envelope text-primary" title="Unread"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $contact->name }}</strong>
                                        @if($contact->phone)
                                            <br><small class="text-muted">{{ $contact->phone }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        @if($contact->subject)
                                            {{ Str::limit($contact->subject, 30) }}
                                        @else
                                            <span class="text-muted">No subject</span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($contact->message, 50) }}</td>
                                    <td>
                                        <small>{{ $contact->created_at->format('M d, Y') }}<br>{{ $contact->created_at->format('h:i A') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.contacts.show', $contact) }}"
                                               class="btn btn-sm btn-outline-info"
                                               title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if(!$contact->is_read)
                                            <form action="{{ route('admin.contacts.mark-read', $contact) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-success"
                                                        title="Mark as Read">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            @else
                                            <form action="{{ route('admin.contacts.mark-unread', $contact) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-warning"
                                                        title="Mark as Unread">
                                                    <i class="fas fa-undo"></i>
                                                </button>
                                            </form>
                                            @endif
                                            <form action="{{ route('admin.contacts.destroy', $contact) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this message?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
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

                    <div class="d-flex justify-content-center">
                        {{ $contacts->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No contact messages found</h5>
                        <p class="text-muted mb-0">Contact messages will appear here when users submit the contact form.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
function toggleBulkActions() {
    const form = document.getElementById('bulk-action-form');
    const checkboxHeader = document.getElementById('bulk-checkbox-header');
    const checkboxCells = document.querySelectorAll('.bulk-checkbox-cell');

    if (form.style.display === 'none') {
        form.style.display = 'block';
        checkboxHeader.style.display = 'table-cell';
        checkboxCells.forEach(cell => cell.style.display = 'table-cell');
    } else {
        form.style.display = 'none';
        checkboxHeader.style.display = 'none';
        checkboxCells.forEach(cell => cell.style.display = 'none');
        // Reset checkboxes
        document.getElementById('select-all').checked = false;
        document.querySelectorAll('.contact-checkbox').forEach(checkbox => checkbox.checked = false);
    }
}

// Select all functionality
document.getElementById('select-all').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.contact-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});

// Update bulk form with selected checkboxes
document.getElementById('bulk-action-form').addEventListener('submit', function(e) {
    const selectedCheckboxes = document.querySelectorAll('.contact-checkbox:checked');
    if (selectedCheckboxes.length === 0) {
        e.preventDefault();
        alert('Please select at least one message.');
        return false;
    }

    // Add selected IDs to form
    selectedCheckboxes.forEach(checkbox => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'contact_ids[]';
        input.value = checkbox.value;
        this.appendChild(input);
    });
});
</script>
@endsection
