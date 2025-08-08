@extends('admin.layouts.app')

@section('title', 'Edit Truck')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Edit Truck</h1>
            <p class="text-muted">Update truck and driver information</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.trucks.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back to Trucks
            </a>
        </div>
    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-truck me-2"></i>
                        Truck Information
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.trucks.update', $truck) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Truck Number -->
                            <div class="col-md-6 mb-3">
                                <label for="truck_number" class="form-label">
                                    Truck Number <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('truck_number') is-invalid @enderror" 
                                       id="truck_number" 
                                       name="truck_number" 
                                       value="{{ old('truck_number', $truck->truck_number) }}" 
                                       placeholder="Enter truck number"
                                       required>
                                @error('truck_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Driver Name -->
                            <div class="col-md-6 mb-3">
                                <label for="driver_name" class="form-label">
                                    Driver Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('driver_name') is-invalid @enderror" 
                                       id="driver_name" 
                                       name="driver_name" 
                                       value="{{ old('driver_name', $truck->driver_name) }}" 
                                       placeholder="Enter driver name"
                                       required>
                                @error('driver_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Driver Phone -->
                            <div class="col-md-6 mb-3">
                                <label for="driver_phone" class="form-label">Driver Phone</label>
                                <input type="tel" 
                                       class="form-control @error('driver_phone') is-invalid @enderror" 
                                       id="driver_phone" 
                                       name="driver_phone" 
                                       value="{{ old('driver_phone', $truck->driver_phone) }}" 
                                       placeholder="Enter phone number">
                                @error('driver_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Driver License -->
                            <div class="col-md-6 mb-3">
                                <label for="driver_license" class="form-label">Driver License</label>
                                <input type="text" 
                                       class="form-control @error('driver_license') is-invalid @enderror" 
                                       id="driver_license" 
                                       name="driver_license" 
                                       value="{{ old('driver_license', $truck->driver_license) }}" 
                                       placeholder="Enter license number">
                                @error('driver_license')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Truck Type -->
                            <div class="col-md-6 mb-3">
                                <label for="truck_type" class="form-label">Truck Type</label>
                                <select class="form-select @error('truck_type') is-invalid @enderror" 
                                        id="truck_type" 
                                        name="truck_type">
                                    <option value="">Select truck type</option>
                                    <option value="flatbed" {{ old('truck_type', $truck->truck_type) == 'flatbed' ? 'selected' : '' }}>Flatbed</option>
                                    <option value="box_truck" {{ old('truck_type', $truck->truck_type) == 'box_truck' ? 'selected' : '' }}>Box Truck</option>
                                    <option value="refrigerated" {{ old('truck_type', $truck->truck_type) == 'refrigerated' ? 'selected' : '' }}>Refrigerated</option>
                                    <option value="tanker" {{ old('truck_type', $truck->truck_type) == 'tanker' ? 'selected' : '' }}>Tanker</option>
                                    <option value="dump_truck" {{ old('truck_type', $truck->truck_type) == 'dump_truck' ? 'selected' : '' }}>Dump Truck</option>
                                    <option value="pickup" {{ old('truck_type', $truck->truck_type) == 'pickup' ? 'selected' : '' }}>Pickup</option>
                                    <option value="trailer" {{ old('truck_type', $truck->truck_type) == 'trailer' ? 'selected' : '' }}>Trailer</option>
                                </select>
                                @error('truck_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Capacity -->
                            <div class="col-md-6 mb-3">
                                <label for="capacity" class="form-label">Capacity (tons)</label>
                                <input type="number" 
                                       class="form-control @error('capacity') is-invalid @enderror" 
                                       id="capacity" 
                                       name="capacity" 
                                       value="{{ old('capacity', $truck->capacity) }}" 
                                       placeholder="Enter capacity in tons"
                                       step="0.01"
                                       min="0">
                                @error('capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label for="is_active" class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="is_active" 
                                           name="is_active" 
                                           value="1" 
                                           {{ old('is_active', $truck->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                                @error('is_active')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.trucks.index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-times me-2"></i>
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>
                                        Update Truck
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Truck Details Card -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Current Details
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="fw-bold">Truck Information</h6>
                        <ul class="list-unstyled small">
                            <li><strong>Number:</strong> {{ $truck->truck_number }}</li>
                            <li><strong>Type:</strong> {{ $truck->truck_type ? ucfirst(str_replace('_', ' ', $truck->truck_type)) : 'N/A' }}</li>
                            <li><strong>Capacity:</strong> {{ $truck->capacity ? $truck->capacity . ' tons' : 'N/A' }}</li>
                            <li><strong>Status:</strong> 
                                @if($truck->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h6 class="fw-bold">Driver Information</h6>
                        <ul class="list-unstyled small">
                            <li><strong>Name:</strong> {{ $truck->driver_name }}</li>
                            <li><strong>Phone:</strong> {{ $truck->driver_phone ?: 'N/A' }}</li>
                            <li><strong>License:</strong> {{ $truck->driver_license ?: 'N/A' }}</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <h6 class="fw-bold">System Information</h6>
                        <ul class="list-unstyled small text-muted">
                            <li><strong>Created:</strong> {{ $truck->created_at->format('M d, Y H:i') }}</li>
                            <li><strong>Updated:</strong> {{ $truck->updated_at->format('M d, Y H:i') }}</li>
                        </ul>
                    </div>

                    <hr>
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.trucks.show', $truck) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-eye me-2"></i>
                            View Details
                        </a>
                        <form method="POST" action="{{ route('admin.trucks.destroy', $truck) }}" 
                              onsubmit="return confirm('Are you sure you want to delete this truck?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                <i class="fas fa-trash me-2"></i>
                                Delete Truck
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 