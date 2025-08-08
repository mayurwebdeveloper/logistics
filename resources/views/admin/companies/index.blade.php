@extends('admin.layouts.app')

@section('title', 'Companies')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Companies</h1>
            <p class="text-muted">Manage all companies</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>
                New Company
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.companies.index') }}" class="row g-3">
                        <div class="col-md-4">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" class="form-control" id="search" name="search" 
                                   placeholder="Company name, GST no..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-3">
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
                            <a href="{{ route('admin.companies.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i>Clear
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Companies Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-building me-2"></i>
                        All Companies ({{ $companies->total() }})
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($companies->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Company Name</th>
                                        <th>GST No</th>
                                        <th>Address</th>
                                        <th>Mobile No</th>
                                        <th>Second Person</th>
                                        <th>Mobile No 2</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td>
                                                <strong>{{ $company->name }}</strong>
                                            </td>
                                            <td>
                                                @if($company->gst_no)
                                                    <span class="badge bg-info">{{ $company->gst_no }}</span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="text-truncate" style="max-width: 200px;" title="{{ $company->address }}">
                                                    {{ $company->address }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="tel:{{ $company->mobile_no }}" class="text-decoration-none">
                                                    <i class="fas fa-phone me-1"></i>{{ $company->mobile_no }}
                                                </a>
                                            </td>
                                            <td>
                                                @if($company->second_person_name)
                                                    {{ $company->second_person_name }}
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($company->mobile_no2)
                                                    <a href="tel:{{ $company->mobile_no2 }}" class="text-decoration-none">
                                                        <i class="fas fa-phone me-1"></i>{{ $company->mobile_no2 }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($company->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.companies.show', $company) }}" 
                                                       class="btn btn-sm btn-outline-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.companies.edit', $company) }}" 
                                                       class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.companies.destroy', $company) }}" 
                                                          class="d-inline" onsubmit="return confirm('Are you sure you want to delete this company?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
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
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-building fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No companies found</h5>
                            <p class="text-muted">Get started by creating your first company.</p>
                            <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Create Company
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @if($companies->hasPages())
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection 