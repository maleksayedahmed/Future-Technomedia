@extends('admin.layouts.app')

@section('title', 'Menu Management')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Menu Management</h1>
                <a href="{{ route('admin.menu-items.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New Item
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i> Menu Items
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 80px;">Order</th>
                                    <th>Title</th>
                                    <th>Link / Route</th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($menuItems as $item)
                                    <tr>
                                        <td>
                                            <span class="badge bg-secondary rounded-pill">{{ $item->order }}</span>
                                        </td>
                                        <td class="fw-bold">{{ $item->title }}</td>
                                        <td>
                                            @if($item->route)
                                                <code class="text-primary">{{ $item->route }}</code> (Route)
                                            @else
                                                <small class="text-muted">{{ $item->url }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.menu-items.edit', $item) }}" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                onclick="confirmDelete('{{ route('admin.menu-items.destroy', $item) }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">
                                            No menu items found. Click "Add New Item" to create one.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Hidden Delete Form --}}
    <form id="deleteMenuForm" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('scripts')
    <script>
        function confirmDelete(url) {
            if (confirm('Are you sure you want to delete this menu item?')) {
                var form = document.getElementById('deleteMenuForm');
                form.action = url;
                form.submit();
            }
        }
    </script>
@endpush
