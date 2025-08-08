@extends('admin.layouts.app')

@section('title', 'Consignment Details')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Consignment Details</h1>
            <p class="text-muted">{{ $consignment->consignment_number }}</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.consignments.edit', $consignment) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>
                Edit
            </a>
            <a href="{{ route('admin.consignments.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back to List
            </a>
        </div>
    </div>

    <!-- Status Badge -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-info d-flex align-items-center">
                <i class="fas fa-info-circle me-3 fa-2x"></i>
                <div>
                    <h5 class="mb-1">Consignment Status: 
                        @switch($consignment->status)
                            @case('pending')
                                <span class="badge bg-warning fs-6">Pending</span>
                                @break
                            @case('in_transit')
                                <span class="badge bg-info fs-6">In Transit</span>
                                @break
                            @case('delivered')
                                <span class="badge bg-success fs-6">Delivered</span>
                                @break
                            @case('cancelled')
                                <span class="badge bg-danger fs-6">Cancelled</span>
                                @break
                            @default
                                <span class="badge bg-secondary fs-6">Unknown</span>
                        @endswitch
                    </h5>
                    <p class="mb-0">Created on {{ $consignment->created_at->format('M d, Y \a\t h:i A') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Basic Information -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Basic Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Consignment Number:</strong>
                            <p class="text-muted">{{ $consignment->consignment_number }}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Date:</strong>
                            <p class="text-muted">{{ $consignment->consignment_date->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Company:</strong>
                            <p class="text-muted">{{ $consignment->company->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Payment Mode:</strong>
                            <p class="text-muted">{{ ucfirst($consignment->payment_mode) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Parties Information -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-tie me-2"></i>
                        Consignor (From)
                    </h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold">{{ $consignment->consignor->name ?? 'N/A' }}</h6>
                    <p class="text-muted mb-2">{{ $consignment->consignor->address ?? 'N/A' }}</p>
                    @if($consignment->consignor->gst_no)
                        <p class="mb-1"><strong>GST:</strong> {{ $consignment->consignor->gst_no }}</p>
                    @endif
                    @if($consignment->consignor->phone)
                        <p class="mb-1"><strong>Phone:</strong> {{ $consignment->consignor->phone }}</p>
                    @endif
                    <hr>
                    <p class="mb-0"><strong>From Location:</strong></p>
                    <p class="text-muted">{{ $consignment->from_location }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-users me-2"></i>
                        Consignee (To)
                    </h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold">{{ $consignment->consignee->name ?? 'N/A' }}</h6>
                    <p class="text-muted mb-2">{{ $consignment->consignee->address ?? 'N/A' }}</p>
                    @if($consignment->consignee->gst_no)
                        <p class="mb-1"><strong>GST:</strong> {{ $consignment->consignee->gst_no }}</p>
                    @endif
                    @if($consignment->consignee->phone)
                        <p class="mb-1"><strong>Phone:</strong> {{ $consignment->consignee->phone }}</p>
                    @endif
                    <hr>
                    <p class="mb-0"><strong>To Location:</strong></p>
                    <p class="text-muted">{{ $consignment->to_location }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Transport Information -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-truck me-2"></i>
                        Transport & Delivery Details
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Truck Number:</strong>
                            <p class="text-muted">{{ $consignment->truck_number ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Driver Name:</strong>
                            <p class="text-muted">{{ $consignment->driver_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Driver Phone:</strong>
                            <p class="text-muted">{{ $consignment->driver_phone ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Driver License:</strong>
                            <p class="text-muted">{{ $consignment->driver_license ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Capacity:</strong>
                            <p class="text-muted">{{ $consignment->capacity ? $consignment->capacity . ' tons' : 'N/A' }}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Truck Type:</strong>
                            <p class="text-muted">{{ $consignment->truck_type ?? 'N/A' }}</p>
                        </div>
                        <div class="col-12">
                            <strong>Delivery Office Address:</strong>
                            <p class="text-muted">{{ $consignment->delivery_office_address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Consignment Items -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-boxes me-2"></i>
                        Consignment Items ({{ $consignment->items->count() }})
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($consignment->items->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Package Count</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Weight (kg)</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($consignment->items as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->package_count }}</td>
                                            <td>{{ $item->package_type }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->actual_weight ? number_format($item->actual_weight, 2) : 'N/A' }}</td>
                                            <td>₹{{ number_format($item->amount, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-box fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No items found for this consignment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Financial Details -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-rupee-sign me-2"></i>
                        Financial Breakdown
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong>Freight Amount:</strong>
                                <span class="float-end">₹{{ number_format($consignment->freight_amount, 2) }}</span>
                            </div>
                            @if($consignment->igst_rate > 0)
                                <div class="mb-3">
                                    <strong>IGST ({{ $consignment->igst_rate }}%):</strong>
                                    <span class="float-end">₹{{ number_format(($consignment->freight_amount * $consignment->igst_rate) / 100, 2) }}</span>
                                </div>
                            @endif
                            @if($consignment->cgst_rate > 0)
                                <div class="mb-3">
                                    <strong>CGST ({{ $consignment->cgst_rate }}%):</strong>
                                    <span class="float-end">₹{{ number_format(($consignment->freight_amount * $consignment->cgst_rate) / 100, 2) }}</span>
                                </div>
                            @endif
                            @if($consignment->sgst_rate > 0)
                                <div class="mb-3">
                                    <strong>SGST ({{ $consignment->sgst_rate }}%):</strong>
                                    <span class="float-end">₹{{ number_format(($consignment->freight_amount * $consignment->sgst_rate) / 100, 2) }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if($consignment->hamali_union > 0)
                                <div class="mb-3">
                                    <strong>Hamali/Union Charges:</strong>
                                    <span class="float-end">₹{{ number_format($consignment->hamali_union, 2) }}</span>
                                </div>
                            @endif
                            @if($consignment->surcharge > 0)
                                <div class="mb-3">
                                    <strong>Surcharge:</strong>
                                    <span class="float-end">₹{{ number_format($consignment->surcharge, 2) }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-0">
                                <strong>Total Amount:</strong>
                                <span class="float-end text-success">₹{{ number_format($consignment->total_amount, 2) }}</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-shield-alt me-2"></i>
                        Insurance & Risk
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>At Owner's Risk:</strong>
                        <span class="float-end">
                            @if($consignment->at_owners_risk)
                                <span class="badge bg-warning">Yes</span>
                            @else
                                <span class="badge bg-success">No</span>
                            @endif
                        </span>
                    </div>
                    <div class="mb-3">
                        <strong>Insured:</strong>
                        <span class="float-end">
                            @if($consignment->is_insured)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </span>
                    </div>
                    @if($consignment->is_insured)
                        @if($consignment->insurance_company)
                            <div class="mb-2">
                                <strong>Insurance Company:</strong>
                                <p class="text-muted mb-1">{{ $consignment->insurance_company }}</p>
                            </div>
                        @endif
                        @if($consignment->insurance_policy_no)
                            <div class="mb-2">
                                <strong>Policy Number:</strong>
                                <p class="text-muted mb-1">{{ $consignment->insurance_policy_no }}</p>
                            </div>
                        @endif
                        @if($consignment->insurance_amount)
                            <div class="mb-2">
                                <strong>Insurance Amount:</strong>
                                <p class="text-muted mb-1">₹{{ number_format($consignment->insurance_amount, 2) }}</p>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <a href="{{ route('admin.consignments.edit', $consignment) }}" class="btn btn-warning btn-lg me-3">
                        <i class="fas fa-edit me-2"></i>
                        Edit Consignment
                    </a>
                    <button type="button" class="btn btn-info btn-lg me-3" onclick="window.print()">
                        <i class="fas fa-print me-2"></i>
                        Print Details
                    </button>
                    <form method="POST" 
                          action="{{ route('admin.consignments.destroy', $consignment) }}" 
                          class="d-inline"
                          onsubmit="return confirm('Are you sure you want to delete this consignment? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg">
                            <i class="fas fa-trash me-2"></i>
                            Delete Consignment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
@media print {
    .btn, .card-header, .navbar, .sidebar {
        display: none !important;
    }
    .card {
        border: 1px solid #000 !important;
        box-shadow: none !important;
    }
}
</style>
@endpush
@endsection

