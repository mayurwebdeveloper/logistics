@extends('admin.layouts.app')

@section('title', 'View Consignee')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">{{ $consignee->name }}</h1>
            <p class="text-muted">Consignee Details</p>
        </div>
        <div class="col-md-6 text-end">
            <div class="btn-group" role="group">
                <a href="{{ route('admin.consignees.edit', $consignee->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-2"></i>
                    Edit
                </a>
                <a href="{{ route('admin.consignees.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Back to Consignees
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Consignee Information -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user me-2"></i>
                        Consignee Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="fw-bold" style="width: 140px;">Name:</td>
                                    <td>{{ $consignee->name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Address:</td>
                                    <td>{{ $consignee->address }}</td>
                                </tr>
                                @if($consignee->gst_no)
                                <tr>
                                    <td class="fw-bold">GST Number:</td>
                                    <td><span class="badge bg-light text-dark">{{ $consignee->gst_no }}</span></td>
                                </tr>
                                @endif
                                @if($consignee->contact_person)
                                <tr>
                                    <td class="fw-bold">Contact Person:</td>
                                    <td>{{ $consignee->contact_person }}</td>
                                </tr>
                                @endif
                                @if($consignee->phone)
                                <tr>
                                    <td class="fw-bold">Phone:</td>
                                    <td>
                                        <a href="tel:{{ $consignee->phone }}" class="text-decoration-none">
                                            <i class="fas fa-phone me-1"></i>{{ $consignee->phone }}
                                        </a>
                                    </td>
                                </tr>
                                @endif
                                @if($consignee->email)
                                <tr>
                                    <td class="fw-bold">Email:</td>
                                    <td>
                                        <a href="mailto:{{ $consignee->email }}" class="text-decoration-none">
                                            <i class="fas fa-envelope me-1"></i>{{ $consignee->email }}
                                        </a>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="fw-bold">Status:</td>
                                    <td>
                                        @if($consignee->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Created:</td>
                                    <td>{{ $consignee->created_at->format('M d, Y \a\t h:i A') }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Last Updated:</td>
                                    <td>{{ $consignee->updated_at->format('M d, Y \a\t h:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-bar me-2"></i>
                        Statistics
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="border-end">
                                <h3 class="text-primary mb-1">{{ $consignee->consignments()->count() }}</h3>
                                <p class="text-muted mb-0">Total Consignments</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <h3 class="text-success mb-1">{{ $consignee->consignments()->where('status', 'delivered')->count() }}</h3>
                                <p class="text-muted mb-0">Delivered</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="border-end">
                                <h3 class="text-warning mb-1">{{ $consignee->consignments()->where('status', 'in_transit')->count() }}</h3>
                                <p class="text-muted mb-0">In Transit</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <h3 class="text-info mb-1">{{ $consignee->consignments()->where('status', 'pending')->count() }}</h3>
                                <p class="text-muted mb-0">Pending</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Associated Consignments -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-box me-2"></i>
                        Associated Consignments ({{ $consignments->total() }})
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
                                                @if($consignment->consignor)
                                                    {{ $consignment->consignor->name }}
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($consignment->truck_number)
                                                    {{ $consignment->truck_number }}
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>₹{{ number_format($consignment->total_amount, 2) }}</td>
                                            <td>
                                                @switch($consignment->status)
                                                    @case('pending')
                                                        <span class="badge bg-info">Pending</span>
                                                        @break
                                                    @case('in_transit')
                                                        <span class="badge bg-warning">In Transit</span>
                                                        @break
                                                    @case('delivered')
                                                        <span class="badge bg-success">Delivered</span>
                                                        @break
                                                    @case('cancelled')
                                                        <span class="badge bg-danger">Cancelled</span>
                                                        @break
                                                    @default
                                                        <span class="badge bg-secondary">{{ ucfirst($consignment->status) }}</span>
                                                @endswitch
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.consignments.show', $consignment->id) }}" 
                                                   class="btn btn-sm btn-outline-info" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-box fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No consignments found</h5>
                            <p class="text-muted">This consignee has no associated consignments yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination for Consignments -->
    @if($consignments->hasPages())
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{ $consignments->links() }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection 