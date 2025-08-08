@extends('admin.layouts.app')

@section('title', 'Consignees')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Consignees</h1>
            <p class="text-muted">Manage all consignees</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.consignees.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>
                New Consignee
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.consignees.index') }}" class="row g-3">
                        <div class="col-md-4">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" class="form-control" id="search" name="search" 
                                   placeholder="Name, contact person, email, phone, GST..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">All Status</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-5 d-flex align-items-end">
                            <button type="submit" class="btn btn-outline-primary me-2">
                                <i class="fas fa-search me-1"></i>Filter
                            </button>
                            <a href="{{ route('admin.consignees.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i>Clear
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Consignees Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-users me-2"></i>
                        All Consignees ({{ $consignees->total() }})
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($consignees->count() > 0)
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
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($consignees as $consignee)
                                        <tr>
                                            <td>
                                                <div>
                                                    <strong>{{ $consignee->name }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ Str::limit($consignee->address, 50) }}</small>
                                                </div>
                                            </td>
                                            <td>
                                                @if($consignee->contact_person)
                                                    {{ $consignee->contact_person }}
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($consignee->phone)
                                                    <a href="tel:{{ $consignee->phone }}" class="text-decoration-none">
                                                        {{ $consignee->phone }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($consignee->email)
                                                    <a href="mailto:{{ $consignee->email }}" class="text-decoration-none">
                                                        {{ $consignee->email }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($consignee->gst_no)
                                                    <span class="badge bg-light text-dark">{{ $consignee->gst_no }}</span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($consignee->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ $consignee->created_at->format('M d, Y') }}
                                                </small>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.consignees.show', $consignee->id) }}" 
                                                       class="btn btn-sm btn-outline-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.consignees.edit', $consignee->id) }}" 
                                                       class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.consignees.destroy', $consignee->id) }}" 
                                                          class="d-inline" onsubmit="return confirm('Are you sure you want to delete this consignee?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
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
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No consignees found</h5>
                            <p class="text-muted">Get started by creating your first consignee.</p>
                            <a href="{{ route('admin.consignees.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Create Consignee
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @if($consignees->hasPages())
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{ $consignees->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection 