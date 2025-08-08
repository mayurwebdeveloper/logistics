@extends('admin.layouts.app')

@section('title', 'Consignors')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Consignors</h1>
            <p class="text-muted">Manage all consignors</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.consignors.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>
                New Consignor
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.consignors.index') }}" class="row g-3">
                        <div class="col-md-3">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" class="form-control" id="search" name="search" 
                                   placeholder="Name, GST No, Contact..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">All Status</option>
                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-outline-primary me-2">
                                <i class="fas fa-search me-1"></i>Filter
                            </button>
                            <a href="{{ route('admin.consignors.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i>Clear
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Consignors Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-tie me-2"></i>
                        All Consignors ({{ $consignors->total() }})
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($consignors->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact Person</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>GST No</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($consignors as $consignor)
                                        <tr>
                                            <td>
                                                <div>
                                                    <strong>{{ $consignor->name }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ Str::limit($consignor->address, 50) }}</small>
                                                </div>
                                            </td>
                                            <td>{{ $consignor->contact_person ?? 'N/A' }}</td>
                                            <td>{{ $consignor->phone ?? 'N/A' }}</td>
                                            <td>{{ $consignor->email ?? 'N/A' }}</td>
                                            <td>{{ $consignor->gst_no ?? 'N/A' }}</td>
                                            <td>
                                                @if($consignor->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.consignors.show', $consignor) }}" 
                                                       class="btn btn-sm btn-outline-primary" 
                                                       data-bs-toggle="tooltip" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.consignors.edit', $consignor) }}" 
                                                       class="btn btn-sm btn-outline-warning"
                                                       data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST" 
                                                          action="{{ route('admin.consignors.destroy', $consignor) }}" 
                                                          class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this consignor?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger"
                                                                data-bs-toggle="tooltip" title="Delete">
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
                        
                        <!-- Pagination -->
                        <div class="card-footer bg-white">
                            {{ $consignors->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-user-tie fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No consignors found</h5>
                            <p class="text-muted">Get started by creating your first consignor.</p>
                            <a href="{{ route('admin.consignors.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>
                                Create Consignor
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 