@extends('admin.layouts.app')

@section('title', 'Consignments')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Consignments</h1>
            <p class="text-muted">Manage all consignments</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.consignments.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>
                New Consignment
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.consignments.index') }}" class="row g-3">
                        <div class="col-md-3">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" class="form-control" id="search" name="search" 
                                   placeholder="Consignment number..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">All Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_transit" {{ request('status') == 'in_transit' ? 'selected' : '' }}>In Transit</option>
                                <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="from_date" class="form-label">From Date</label>
                            <input type="date" class="form-control" id="from_date" name="from_date" 
                                   value="{{ request('from_date') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="to_date" class="form-label">To Date</label>
                            <input type="date" class="form-control" id="to_date" name="to_date" 
                                   value="{{ request('to_date') }}">
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-outline-primary me-2">
                                <i class="fas fa-search me-1"></i>Filter
                            </button>
                            <a href="{{ route('admin.consignments.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i>Clear
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Consignments Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-box me-2"></i>
                        All Consignments ({{ $consignments->total() }})
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($consignments->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Consignment #</th>
                                        <th>Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Truck</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($consignments as $consignment)
                                        <tr>
                                            <td>
                                                <strong>{{ $consignment->consignment_number }}</strong>
                                            </td>
                                            <td>{{ $consignment->consignment_date->format('M d, Y') }}</td>
                                            <td>
                                                <div>
                                                    <strong>{{ $consignment->consignor->name ?? 'N/A' }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $consignment->from_location }}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>{{ $consignment->consignee->name ?? 'N/A' }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $consignment->to_location }}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>{{ $consignment->truck_number ?? 'N/A' }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $consignment->driver_name ?? 'N/A' }}</small>
                                                </div>
                                            </td>
                                            <td>₹{{ number_format($consignment->total_amount, 2) }}</td>
                                            <td>
                                                @switch($consignment->status)
                                                    @case('pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                        @break
                                                    @case('in_transit')
                                                        <span class="badge bg-info">In Transit</span>
                                                        @break
                                                    @case('delivered')
                                                        <span class="badge bg-success">Delivered</span>
                                                        @break
                                                    @case('cancelled')
                                                        <span class="badge bg-danger">Cancelled</span>
                                                        @break
                                                    @default
                                                        <span class="badge bg-secondary">Unknown</span>
                                                @endswitch
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.consignments.show', $consignment) }}" 
                                                       class="btn btn-sm btn-outline-primary" 
                                                       data-bs-toggle="tooltip" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.consignments.edit', $consignment) }}" 
                                                       class="btn btn-sm btn-outline-warning"
                                                       data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST" 
                                                          action="{{ route('admin.consignments.destroy', $consignment) }}" 
                                                          class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this consignment?')">
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
                            {{ $consignments->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-box fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No consignments found</h5>
                            <p class="text-muted">Get started by creating your first consignment.</p>
                            <a href="{{ route('admin.consignments.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>
                                Create Consignment
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

