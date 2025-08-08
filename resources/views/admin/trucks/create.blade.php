@extends('admin.layouts.app')

@section('title', 'Add New Truck')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Add New Truck</h1>
            <p class="text-muted">Register a new truck and driver information</p>
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
                    <form method="POST" action="{{ route('admin.trucks.store') }}">
                        @csrf
                        
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
                                       value="{{ old('truck_number') }}" 
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
                                       value="{{ old('driver_name') }}" 
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
                                       value="{{ old('driver_phone') }}" 
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
                                       value="{{ old('driver_license') }}" 
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
                                    <option value="flatbed" {{ old('truck_type') == 'flatbed' ? 'selected' : '' }}>Flatbed</option>
                                    <option value="box_truck" {{ old('truck_type') == 'box_truck' ? 'selected' : '' }}>Box Truck</option>
                                    <option value="refrigerated" {{ old('truck_type') == 'refrigerated' ? 'selected' : '' }}>Refrigerated</option>
                                    <option value="tanker" {{ old('truck_type') == 'tanker' ? 'selected' : '' }}>Tanker</option>
                                    <option value="dump_truck" {{ old('truck_type') == 'dump_truck' ? 'selected' : '' }}>Dump Truck</option>
                                    <option value="pickup" {{ old('truck_type') == 'pickup' ? 'selected' : '' }}>Pickup</option>
                                    <option value="trailer" {{ old('truck_type') == 'trailer' ? 'selected' : '' }}>Trailer</option>
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
                                       value="{{ old('capacity') }}" 
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
                                           {{ old('is_active', '1') ? 'checked' : '' }}>
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
                                        Save Truck
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Help Card -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Help & Guidelines
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="fw-bold">Required Fields</h6>
                        <ul class="list-unstyled small text-muted">
                            <li><i class="fas fa-asterisk text-danger me-1"></i>Truck Number</li>
                            <li><i class="fas fa-asterisk text-danger me-1"></i>Driver Name</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <h6 class="fw-bold">Truck Types</h6>
                        <ul class="list-unstyled small text-muted">
                            <li><strong>Flatbed:</strong> Open cargo area</li>
                            <li><strong>Box Truck:</strong> Enclosed cargo area</li>
                            <li><strong>Refrigerated:</strong> Temperature controlled</li>
                            <li><strong>Tanker:</strong> Liquid transport</li>
                            <li><strong>Dump Truck:</strong> For bulk materials</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <h6 class="fw-bold">Tips</h6>
                        <ul class="list-unstyled small text-muted">
                            <li>• Truck number should be unique</li>
                            <li>• Include driver contact for emergencies</li>
                            <li>• Set appropriate capacity for load planning</li>
                            <li>• Keep inactive trucks for historical records</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 