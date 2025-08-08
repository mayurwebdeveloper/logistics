@extends('admin.layouts.app')

@section('title', 'Trucks')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Trucks</h1>
            <p class="text-muted">Manage all trucks and drivers</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.trucks.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>
                New Truck
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.trucks.index') }}" class="row g-3">
                        <div class="col-md-3">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" class="form-control" id="search" name="search" 
                                   placeholder="Truck number or driver name..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="truck_type" class="form-label">Truck Type</label>
                            <select class="form-select" id="truck_type" name="truck_type">
                                <option value="">All Types</option>
                                <option value="flatbed" {{ request('truck_type') == 'flatbed' ? 'selected' : '' }}>Flatbed</option>
                                <option value="box_truck" {{ request('truck_type') == 'box_truck' ? 'selected' : '' }}>Box Truck</option>
                                <option value="refrigerated" {{ request('truck_type') == 'refrigerated' ? 'selected' : '' }}>Refrigerated</option>
                                <option value="tanker" {{ request('truck_type') == 'tanker' ? 'selected' : '' }}>Tanker</option>
                                <option value="dump_truck" {{ request('truck_type') == 'dump_truck' ? 'selected' : '' }}>Dump Truck</option>
                            </select>
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
                            <a href="{{ route('admin.trucks.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i>Clear
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Trucks Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-truck me-2"></i>
                        All Trucks ({{ $trucks->total() }})
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($trucks->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Truck Number</th>
                                        <th>Driver</th>
                                        <th>Contact</th>
                                        <th>Type</th>
                                        <th>Capacity</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trucks as $truck)
                                        <tr>
                                            <td>
                                                <strong>{{ $truck->truck_number }}</strong>
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>{{ $truck->driver_name }}</strong>
                                                    @if($truck->driver_license)
                                                        <br>
                                                        <small class="text-muted">License: {{ $truck->driver_license }}</small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @if($truck->driver_phone)
                                                    <a href="tel:{{ $truck->driver_phone }}" class="text-decoration-none">
                                                        <i class="fas fa-phone me-1"></i>{{ $truck->driver_phone }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($truck->truck_type)
                                                    <span class="badge bg-info">{{ ucfirst(str_replace('_', ' ', $truck->truck_type)) }}</span>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($truck->capacity)
                                                    <span class="badge bg-secondary">{{ $truck->capacity }} tons</span>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($truck->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.trucks.show', $truck) }}" 
                                                       class="btn btn-sm btn-outline-primary" 
                                                       data-bs-toggle="tooltip" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.trucks.edit', $truck) }}" 
                                                       class="btn btn-sm btn-outline-warning"
                                                       data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST" 
                                                          action="{{ route('admin.trucks.destroy', $truck) }}" 
                                                          class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this truck?')">
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
                            {{ $trucks->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-truck fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No trucks found</h5>
                            <p class="text-muted">Get started by adding your first truck.</p>
                            <a href="{{ route('admin.trucks.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>
                                Add Truck
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 