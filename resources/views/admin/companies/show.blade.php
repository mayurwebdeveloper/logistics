@extends('admin.layouts.app')

@section('title', 'Company Details')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Company Details</h1>
            <p class="text-muted">View company information</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i>
                Back to Companies
            </a>
            <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i>
                Edit Company
            </a>
        </div>
    </div>

    <!-- Company Details -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-building me-2"></i>
                        Company Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Company Name -->
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-building fa-2x text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 text-muted">Company Name</h6>
                                    <h5 class="mb-0">{{ $company->name }}</h5>
                                </div>
                            </div>
                        </div>

                        <!-- GST Number -->
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-receipt fa-2x text-info"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 text-muted">GST Number</h6>
                                    <h5 class="mb-0">
                                        @if($company->gst_no)
                                            <span class="badge bg-info">{{ $company->gst_no }}</span>
                                        @else
                                            <span class="text-muted">Not provided</span>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-12 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-map-marker-alt fa-2x text-danger"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 text-muted">Address</h6>
                                    <p class="mb-0">{{ $company->address }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Number -->
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-phone fa-2x text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 text-muted">Mobile Number</h6>
                                    <h5 class="mb-0">
                                        <a href="tel:{{ $company->mobile_no }}" class="text-decoration-none">
                                            {{ $company->mobile_no }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <!-- Second Person Name -->
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-user fa-2x text-warning"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 text-muted">Second Person Name</h6>
                                    <h5 class="mb-0">
                                        @if($company->second_person_name)
                                            {{ $company->second_person_name }}
                                        @else
                                            <span class="text-muted">Not provided</span>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Number 2 -->
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-mobile-alt fa-2x text-secondary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 text-muted">Mobile Number 2</h6>
                                    <h5 class="mb-0">
                                        @if($company->mobile_no2)
                                            <a href="tel:{{ $company->mobile_no2 }}" class="text-decoration-none">
                                                {{ $company->mobile_no2 }}
                                            </a>
                                        @else
                                            <span class="text-muted">Not provided</span>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-toggle-on fa-2x text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 text-muted">Status</h6>
                                    <h5 class="mb-0">
                                        @if($company->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <!-- Created Date -->
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-calendar-plus fa-2x text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 text-muted">Created Date</h6>
                                    <h5 class="mb-0">{{ $company->created_at->format('M d, Y') }}</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Last Updated -->
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-calendar-check fa-2x text-info"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1 text-muted">Last Updated</h6>
                                    <h5 class="mb-0">{{ $company->updated_at->format('M d, Y') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <form method="POST" action="{{ route('admin.companies.destroy', $company) }}" 
                                          class="d-inline" onsubmit="return confirm('Are you sure you want to delete this company?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash me-2"></i>Delete Company
                                        </button>
                                    </form>
                                </div>
                                <div>
                                    <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary me-2">
                                        <i class="fas fa-list me-2"></i>All Companies
                                    </a>
                                    <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-primary">
                                        <i class="fas fa-edit me-2"></i>Edit Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card-body .d-flex {
        border-bottom: 1px solid #f8f9fa;
        padding-bottom: 1rem;
    }
    .card-body .d-flex:last-child {
        border-bottom: none;
    }
</style>
@endpush 