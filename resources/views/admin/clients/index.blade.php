@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clients Management</h1>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Client
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
            <h6 class="m-0 font-weight-bold text-primary">Clients List</h6>
        </div>
        <div class="card-body">
            @if($clients->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Website</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>
                                        @if($client->getFirstMedia('logo'))
                                            <img src="{{ $client->getFirstMedia('logo')->getUrl('thumb') }}"
                                                 alt="{{ $client->name }}"
                                                 style="width: 80px; height: 40px; object-fit: contain;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center"
                                                 style="width: 80px; height: 40px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $client->name }}</td>
                                    <td>
                                        @if($client->website_url)
                                            <a href="{{ $client->website_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-external-link-alt"></i> Visit
                                            </a>
                                        @else
                                            <span class="text-muted">No website</span>
                                        @endif
                                    </td>
                                    <td>{{ $client->order }}</td>
                                    <td>
                                        @if($client->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $client->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.clients.show', $client) }}"
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.clients.edit', $client) }}"
                                               class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.clients.destroy', $client) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this client?');">
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
                    {{ $clients->links() }}
                </div>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No clients found</h5>
                    <p class="text-muted">Start by creating your first client.</p>
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Client
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
