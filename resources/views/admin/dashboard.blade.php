@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">Dashboard</h1>
            <p class="text-muted">Welcome back, {{ Auth::guard('admin')->user()->name }}!</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card card-stats border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Consignments</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $stats['total_consignments'] }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                <i class="fas fa-box fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card card-stats success border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Active Trucks</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $stats['total_trucks'] }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                <i class="fas fa-truck fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card card-stats warning border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Pending Deliveries</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $stats['pending_consignments'] }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card card-stats danger border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Invoices</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $stats['total_invoices'] }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fas fa-file-invoice fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Overview -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-pie me-2"></i>
                        Consignment Status Overview
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-3">
                            <div class="border-end">
                                <h4 class="text-warning">{{ $stats['pending_consignments'] }}</h4>
                                <small class="text-muted">Pending</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="border-end">
                                <h4 class="text-info">{{ $stats['in_transit_consignments'] }}</h4>
                                <small class="text-muted">In Transit</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="border-end">
                                <h4 class="text-success">{{ $stats['delivered_consignments'] }}</h4>
                                <small class="text-muted">Delivered</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <h4 class="text-primary">{{ $stats['total_consignments'] }}</h4>
                            <small class="text-muted">Total</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-users me-2"></i>
                        Quick Stats
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Consignors</span>
                        <span class="badge bg-primary rounded-pill">{{ $stats['total_consignors'] }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Consignees</span>
                        <span class="badge bg-success rounded-pill">{{ $stats['total_consignees'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Consignments -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-history me-2"></i>
                        Recent Consignments
                    </h5>
                    <a href="{{ route('admin.consignments.index') }}" class="btn btn-sm btn-outline-primary">
                        View All
                    </a>
                </div>
                <div class="card-body p-0">
                    @if($recent_consignments->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Consignment #</th>
                                        <th>Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Truck</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recent_consignments as $consignment)
                                        <tr>
                                            <td>
                                                <strong>{{ $consignment->consignment_number }}</strong>
                                            </td>
                                            <td>{{ $consignment->consignment_date->format('M d, Y') }}</td>
                                            <td>{{ $consignment->consignor->name ?? 'N/A' }}</td>
                                            <td>{{ $consignment->consignee->name ?? 'N/A' }}</td>
                                            <td>{{ $consignment->truck_number ?? 'N/A' }}</td>
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
                                                <a href="{{ route('admin.consignments.show', $consignment) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-box fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No consignments found. <a href="{{ route('admin.consignments.create') }}">Create your first consignment</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bolt me-2"></i>
                        Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.consignments.create') }}" class="btn btn-primary w-100">
                                <i class="fas fa-plus me-2"></i>
                                New Consignment
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.trucks.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-truck me-2"></i>
                                Add Truck
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.consignors.create') }}" class="btn btn-info w-100">
                                <i class="fas fa-user-tie me-2"></i>
                                Add Consignor
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.consignees.create') }}" class="btn btn-warning w-100">
                                <i class="fas fa-users me-2"></i>
                                Add Consignee
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .icon-shape {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush
@endsection

