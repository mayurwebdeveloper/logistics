@extends('admin.layouts.app')

@section('title', 'Truck Details')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Truck Details</h1>
            <p class="text-muted">View complete truck and driver information</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.trucks.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back to Trucks
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Main Information -->
        <div class="col-lg-8">
            <!-- Truck Information Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-truck me-2"></i>
                        Truck Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">Truck Number</label>
                            <p class="mb-0 fs-5">{{ $truck->truck_number }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">Truck Type</label>
                            <p class="mb-0">
                                @if($truck->truck_type)
                                    <span class="badge bg-info fs-6">{{ ucfirst(str_replace('_', ' ', $truck->truck_type)) }}</span>
                                @else
                                    <span class="text-muted">Not specified</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">Capacity</label>
                            <p class="mb-0">
                                @if($truck->capacity)
                                    <span class="badge bg-secondary fs-6">{{ $truck->capacity }} tons</span>
                                @else
                                    <span class="text-muted">Not specified</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">Status</label>
                            <p class="mb-0">
                                @if($truck->is_active)
                                    <span class="badge bg-success fs-6">Active</span>
                                @else
                                    <span class="badge bg-danger fs-6">Inactive</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Driver Information Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user me-2"></i>
                        Driver Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">Driver Name</label>
                            <p class="mb-0 fs-5">{{ $truck->driver_name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">Phone Number</label>
                            <p class="mb-0">
                                @if($truck->driver_phone)
                                    <a href="tel:{{ $truck->driver_phone }}" class="text-decoration-none">
                                        <i class="fas fa-phone me-1"></i>{{ $truck->driver_phone }}
                                    </a>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">Driver License</label>
                            <p class="mb-0">
                                @if($truck->driver_license)
                                    <code class="fs-6">{{ $truck->driver_license }}</code>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Consignments Card -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-box me-2"></i>
                        Recent Consignments
                    </h5>
                </div>
                <div class="card-body">
                    @if($truck->consignments->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Consignment #</th>
                                        <th>Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($truck->consignments->take(5) as $consignment)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.consignments.show', $consignment) }}" 
                                                   class="text-decoration-none">
                                                    {{ $consignment->consignment_number }}
                                                </a>
                                            </td>
                                            <td>{{ $consignment->consignment_date->format('M d, Y') }}</td>
                                            <td>{{ $consignment->from_location }}</td>
                                            <td>{{ $consignment->to_location }}</td>
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
                                            <td>₹{{ number_format($consignment->total_amount, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($truck->consignments->count() > 5)
                            <div class="text-center mt-3">
                                <a href="{{ route('admin.consignments.index', ['truck_id' => $truck->id]) }}" 
                                   class="btn btn-outline-primary btn-sm">
                                    View All Consignments ({{ $truck->consignments->count() }})
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-box fa-2x text-muted mb-3"></i>
                            <p class="text-muted mb-0">No consignments assigned to this truck yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Quick Actions Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-cogs me-2"></i>
                        Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.trucks.edit', $truck) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit Truck
                        </a>
                        <a href="{{ route('admin.consignments.create', ['truck_id' => $truck->id]) }}" 
                           class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>
                            Assign Consignment
                        </a>
                        @if($truck->driver_phone)
                            <a href="tel:{{ $truck->driver_phone }}" class="btn btn-outline-success">
                                <i class="fas fa-phone me-2"></i>
                                Call Driver
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- System Information Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        System Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Created</label>
                        <p class="mb-0">{{ $truck->created_at->format('M d, Y \a\t H:i') }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Last Updated</label>
                        <p class="mb-0">{{ $truck->updated_at->format('M d, Y \a\t H:i') }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Total Consignments</label>
                        <p class="mb-0">
                            <span class="badge bg-primary fs-6">{{ $truck->consignments->count() }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Danger Zone Card -->
            <div class="card shadow-sm border-danger">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Danger Zone
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-muted small mb-3">
                        Once you delete a truck, there is no going back. Please be certain.
                    </p>
                    <form method="POST" action="{{ route('admin.trucks.destroy', $truck) }}" 
                          onsubmit="return confirm('Are you sure you want to delete this truck? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>
                            Delete Truck
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 