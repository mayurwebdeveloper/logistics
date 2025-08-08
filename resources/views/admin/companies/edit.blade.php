@extends('admin.layouts.app')

@section('title', 'Edit Company')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Edit Company</h1>
            <p class="text-muted">Update company information</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back to Companies
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-edit me-2"></i>
                        Company Information
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.companies.update', $company) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Company Name -->
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">
                                    Company Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $company->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- GST Number -->
                            <div class="col-md-6 mb-3">
                                <label for="gst_no" class="form-label">GST Number</label>
                                <input type="text" class="form-control @error('gst_no') is-invalid @enderror" 
                                       id="gst_no" name="gst_no" value="{{ old('gst_no', $company->gst_no) }}" 
                                       placeholder="e.g., 22AAAAA0000A1Z5">
                                @error('gst_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="col-12 mb-3">
                                <label for="address" class="form-label">
                                    Address <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('address') is-invalid @enderror" 
                                          id="address" name="address" rows="3" required>{{ old('address', $company->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-md-6 mb-3">
                                <label for="mobile_no" class="form-label">
                                    Mobile Number <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" 
                                       id="mobile_no" name="mobile_no" value="{{ old('mobile_no', $company->mobile_no) }}" 
                                       placeholder="e.g., 9876543210" required>
                                @error('mobile_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Second Person Name -->
                            <div class="col-md-6 mb-3">
                                <label for="second_person_name" class="form-label">Second Person Name</label>
                                <input type="text" class="form-control @error('second_person_name') is-invalid @enderror" 
                                       id="second_person_name" name="second_person_name" 
                                       value="{{ old('second_person_name', $company->second_person_name) }}">
                                @error('second_person_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mobile Number 2 -->
                            <div class="col-md-6 mb-3">
                                <label for="mobile_no2" class="form-label">Mobile Number 2</label>
                                <input type="text" class="form-control @error('mobile_no2') is-invalid @enderror" 
                                       id="mobile_no2" name="mobile_no2" value="{{ old('mobile_no2', $company->mobile_no2) }}" 
                                       placeholder="e.g., 9876543210">
                                @error('mobile_no2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Update Company
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-label {
        font-weight: 500;
    }
</style>
@endpush 