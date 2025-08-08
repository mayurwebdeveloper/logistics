@extends('admin.layouts.app')

@section('title', 'Edit Consignment')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Edit Consignment</h1>
            <p class="text-muted">Update consignment: {{ $consignment->consignment_number }}</p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.consignments.show', $consignment) }}" class="btn btn-outline-info me-2">
                <i class="fas fa-eye me-2"></i>
                View Details
            </a>
            <a href="{{ route('admin.consignments.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back to List
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.consignments.update', $consignment) }}" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        
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
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="consignment_number" class="form-label">Consignment Number *</label>
                                <input type="text" 
                                       class="form-control @error('consignment_number') is-invalid @enderror" 
                                       id="consignment_number" 
                                       name="consignment_number" 
                                       value="{{ old('consignment_number', $consignment->consignment_number) }}" 
                                       required>
                                @error('consignment_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="consignment_date" class="form-label">Consignment Date *</label>
                                <input type="date" 
                                       class="form-control @error('consignment_date') is-invalid @enderror" 
                                       id="consignment_date" 
                                       name="consignment_date" 
                                       value="{{ old('consignment_date', $consignment->consignment_date->format('Y-m-d')) }}" 
                                       required>
                                @error('consignment_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="company_id" class="form-label">Company *</label>
                                <select class="form-select @error('company_id') is-invalid @enderror" 
                                        id="company_id" 
                                        name="company_id" 
                                        required>
                                    <option value="">Select Company</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" 
                                                {{ old('company_id', $consignment->company_id) == $company->id ? 'selected' : '' }}>
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="pending" {{ old('status', $consignment->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_transit" {{ old('status', $consignment->status) == 'in_transit' ? 'selected' : '' }}>In Transit</option>
                                    <option value="delivered" {{ old('status', $consignment->status) == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" {{ old('status', $consignment->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
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
                        <div class="mb-3">
                            <label for="consignor_id" class="form-label">Consignor *</label>
                            <select class="form-select @error('consignor_id') is-invalid @enderror" 
                                    id="consignor_id" 
                                    name="consignor_id" 
                                    required>
                                <option value="">Select Consignor</option>
                                @foreach($consignors as $consignor)
                                    <option value="{{ $consignor->id }}" 
                                            {{ old('consignor_id', $consignment->consignor_id) == $consignor->id ? 'selected' : '' }}>
                                        {{ $consignor->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('consignor_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="from_location" class="form-label">From Location *</label>
                            <input type="text" 
                                   class="form-control @error('from_location') is-invalid @enderror" 
                                   id="from_location" 
                                   name="from_location" 
                                   value="{{ old('from_location', $consignment->from_location) }}" 
                                   required>
                            @error('from_location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
                        <div class="mb-3">
                            <label for="consignee_id" class="form-label">Consignee *</label>
                            <select class="form-select @error('consignee_id') is-invalid @enderror" 
                                    id="consignee_id" 
                                    name="consignee_id" 
                                    required>
                                <option value="">Select Consignee</option>
                                @foreach($consignees as $consignee)
                                    <option value="{{ $consignee->id }}" 
                                            {{ old('consignee_id', $consignment->consignee_id) == $consignee->id ? 'selected' : '' }}>
                                        {{ $consignee->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('consignee_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="to_location" class="form-label">To Location *</label>
                            <input type="text" 
                                   class="form-control @error('to_location') is-invalid @enderror" 
                                   id="to_location" 
                                   name="to_location" 
                                   value="{{ old('to_location', $consignment->to_location) }}" 
                                   required>
                            @error('to_location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transport & Delivery -->
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
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="truck_number" class="form-label">Truck Number *</label>
                                <input type="text" 
                                       class="form-control @error('truck_number') is-invalid @enderror" 
                                       id="truck_number" 
                                       name="truck_number" 
                                       value="{{ old('truck_number', $consignment->truck_number) }}" 
                                       required>
                                @error('truck_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="driver_name" class="form-label">Driver Name *</label>
                                <input type="text" 
                                       class="form-control @error('driver_name') is-invalid @enderror" 
                                       id="driver_name" 
                                       name="driver_name" 
                                       value="{{ old('driver_name', $consignment->driver_name) }}" 
                                       required>
                                @error('driver_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="driver_phone" class="form-label">Driver Phone</label>
                                <input type="text" 
                                       class="form-control @error('driver_phone') is-invalid @enderror" 
                                       id="driver_phone" 
                                       name="driver_phone" 
                                       value="{{ old('driver_phone', $consignment->driver_phone) }}">
                                @error('driver_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="driver_license" class="form-label">Driver License</label>
                                <input type="text" 
                                       class="form-control @error('driver_license') is-invalid @enderror" 
                                       id="driver_license" 
                                       name="driver_license" 
                                       value="{{ old('driver_license', $consignment->driver_license) }}">
                                @error('driver_license')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="capacity" class="form-label">Capacity (tons)</label>
                                <input type="number" 
                                       class="form-control @error('capacity') is-invalid @enderror" 
                                       id="capacity" 
                                       name="capacity" 
                                       step="0.01" 
                                       value="{{ old('capacity', $consignment->capacity) }}">
                                @error('capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="truck_type" class="form-label">Truck Type</label>
                                <select class="form-select @error('truck_type') is-invalid @enderror" 
                                        id="truck_type" 
                                        name="truck_type">
                                    <option value="">Select Type</option>
                                    <option value="Mini Truck" {{ old('truck_type', $consignment->truck_type) == 'Mini Truck' ? 'selected' : '' }}>Mini Truck</option>
                                    <option value="Tata 407" {{ old('truck_type', $consignment->truck_type) == 'Tata 407' ? 'selected' : '' }}>Tata 407</option>
                                    <option value="Tata 709" {{ old('truck_type', $consignment->truck_type) == 'Tata 709' ? 'selected' : '' }}>Tata 709</option>
                                    <option value="Tata 1109" {{ old('truck_type', $consignment->truck_type) == 'Tata 1109' ? 'selected' : '' }}>Tata 1109</option>
                                    <option value="Tata 1613" {{ old('truck_type', $consignment->truck_type) == 'Tata 1613' ? 'selected' : '' }}>Tata 1613</option>
                                    <option value="Tata 2518" {{ old('truck_type', $consignment->truck_type) == 'Tata 2518' ? 'selected' : '' }}>Tata 2518</option>
                                    <option value="Trailer" {{ old('truck_type', $consignment->truck_type) == 'Trailer' ? 'selected' : '' }}>Trailer</option>
                                    <option value="Container" {{ old('truck_type', $consignment->truck_type) == 'Container' ? 'selected' : '' }}>Container</option>
                                    <option value="Other" {{ old('truck_type', $consignment->truck_type) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('truck_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="delivery_office_address" class="form-label">Delivery Office Address *</label>
                                <textarea class="form-control @error('delivery_office_address') is-invalid @enderror" 
                                          id="delivery_office_address" 
                                          name="delivery_office_address" 
                                          rows="2" 
                                          required>{{ old('delivery_office_address', $consignment->delivery_office_address) }}</textarea>
                                @error('delivery_office_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-boxes me-2"></i>
                            Consignment Items
                        </h5>
                        <button type="button" class="btn btn-light btn-sm" onclick="addItem()">
                            <i class="fas fa-plus me-1"></i>Add Item
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="items-container">
                            @foreach($consignment->items as $index => $item)
                                <div class="item-row border rounded p-3 mb-3">
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                            <label class="form-label">Package Count *</label>
                                            <input type="number" 
                                                   class="form-control" 
                                                   name="items[{{ $index }}][package_count]" 
                                                   value="{{ old('items.'.$index.'.package_count', $item->package_count) }}"
                                                   min="1" 
                                                   required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Package Type</label>
                                            <select class="form-select" name="items[{{ $index }}][package_type]">
                                                <option value="Unit" {{ old('items.'.$index.'.package_type', $item->package_type) == 'Unit' ? 'selected' : '' }}>Unit</option>
                                                <option value="Box" {{ old('items.'.$index.'.package_type', $item->package_type) == 'Box' ? 'selected' : '' }}>Box</option>
                                                <option value="Bag" {{ old('items.'.$index.'.package_type', $item->package_type) == 'Bag' ? 'selected' : '' }}>Bag</option>
                                                <option value="Carton" {{ old('items.'.$index.'.package_type', $item->package_type) == 'Carton' ? 'selected' : '' }}>Carton</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Description *</label>
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="items[{{ $index }}][description]" 
                                                   value="{{ old('items.'.$index.'.description', $item->description) }}"
                                                   required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Weight (kg)</label>
                                            <input type="number" 
                                                   class="form-control" 
                                                   name="items[{{ $index }}][actual_weight]" 
                                                   value="{{ old('items.'.$index.'.actual_weight', $item->actual_weight) }}"
                                                   step="0.01">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Amount *</label>
                                            <input type="number" 
                                                   class="form-control" 
                                                   name="items[{{ $index }}][amount]" 
                                                   value="{{ old('items.'.$index.'.amount', $item->amount) }}"
                                                   step="0.01" 
                                                   required>
                                        </div>
                                        @if($index > 0)
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeItem(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Details -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-danger text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-rupee-sign me-2"></i>
                            Financial Details
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="freight_amount" class="form-label">Freight Amount *</label>
                                <input type="number" 
                                       class="form-control @error('freight_amount') is-invalid @enderror" 
                                       id="freight_amount" 
                                       name="freight_amount" 
                                       step="0.01" 
                                       value="{{ old('freight_amount', $consignment->freight_amount) }}" 
                                       required>
                                @error('freight_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="payment_mode" class="form-label">Payment Mode *</label>
                                <select class="form-select @error('payment_mode') is-invalid @enderror" 
                                        id="payment_mode" 
                                        name="payment_mode" 
                                        required>
                                    <option value="">Select Payment Mode</option>
                                    <option value="cash" {{ old('payment_mode', $consignment->payment_mode) == 'cash' ? 'selected' : '' }}>Cash</option>
                                    <option value="credit" {{ old('payment_mode', $consignment->payment_mode) == 'credit' ? 'selected' : '' }}>Credit</option>
                                    <option value="advance" {{ old('payment_mode', $consignment->payment_mode) == 'advance' ? 'selected' : '' }}>Advance</option>
                                </select>
                                @error('payment_mode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="igst_rate" class="form-label">IGST Rate (%)</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="igst_rate" 
                                       name="igst_rate" 
                                       step="0.01" 
                                       value="{{ old('igst_rate', $consignment->igst_rate) }}">
                            </div>
                            <div class="col-md-2">
                                <label for="cgst_rate" class="form-label">CGST Rate (%)</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="cgst_rate" 
                                       name="cgst_rate" 
                                       step="0.01" 
                                       value="{{ old('cgst_rate', $consignment->cgst_rate) }}">
                            </div>
                            <div class="col-md-2">
                                <label for="sgst_rate" class="form-label">SGST Rate (%)</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="sgst_rate" 
                                       name="sgst_rate" 
                                       step="0.01" 
                                       value="{{ old('sgst_rate', $consignment->sgst_rate) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="hamali_union" class="form-label">Hamali/Union Charges</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="hamali_union" 
                                       name="hamali_union" 
                                       step="0.01" 
                                       value="{{ old('hamali_union', $consignment->hamali_union) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="surcharge" class="form-label">Surcharge</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="surcharge" 
                                       name="surcharge" 
                                       step="0.01" 
                                       value="{{ old('surcharge', $consignment->surcharge) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-save me-2"></i>
                            Update Consignment
                        </button>
                        <a href="{{ route('admin.consignments.show', $consignment) }}" class="btn btn-outline-info btn-lg me-3">
                            <i class="fas fa-eye me-2"></i>
                            View Details
                        </a>
                        <a href="{{ route('admin.consignments.index') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-times me-2"></i>
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
let itemIndex = {{ $consignment->items->count() }};

function addItem() {
    const container = document.getElementById('items-container');
    const newItem = document.createElement('div');
    newItem.className = 'item-row border rounded p-3 mb-3';
    newItem.innerHTML = `
        <div class="row g-3">
            <div class="col-md-2">
                <label class="form-label">Package Count *</label>
                <input type="number" 
                       class="form-control" 
                       name="items[${itemIndex}][package_count]" 
                       min="1" 
                       required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Package Type</label>
                <select class="form-select" name="items[${itemIndex}][package_type]">
                    <option value="Unit">Unit</option>
                    <option value="Box">Box</option>
                    <option value="Bag">Bag</option>
                    <option value="Carton">Carton</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Description *</label>
                <input type="text" 
                       class="form-control" 
                       name="items[${itemIndex}][description]" 
                       required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Weight (kg)</label>
                <input type="number" 
                       class="form-control" 
                       name="items[${itemIndex}][actual_weight]" 
                       step="0.01">
            </div>
            <div class="col-md-2">
                <label class="form-label">Amount *</label>
                <input type="number" 
                       class="form-control" 
                       name="items[${itemIndex}][amount]" 
                       step="0.01" 
                       required>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeItem(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    container.appendChild(newItem);
    itemIndex++;
}

function removeItem(button) {
    const itemRow = button.closest('.item-row');
    if (document.querySelectorAll('.item-row').length > 1) {
        itemRow.remove();
    } else {
        alert('At least one item is required.');
    }
}
</script>
@endpush
@endsection

