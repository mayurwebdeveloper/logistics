<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consignment;
use App\Models\Company;
use App\Models\Consignor;
use App\Models\Consignee;
use App\Models\ConsignmentItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsignmentController extends Controller
{
    public function index()
    {
        $consignments = Consignment::with(['company', 'consignor', 'consignee'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.consignments.index', compact('consignments'));
    }

    public function create()
    {
        $companies = Company::where('is_active', true)->get();
        $consignors = Consignor::where('is_active', true)->get();
        $consignees = Consignee::where('is_active', true)->get();

        return view('admin.consignments.create', compact('companies', 'consignors', 'consignees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'consignment_number' => 'required|string|unique:consignments',
            'consignment_date' => 'required|date',
            'company_id' => 'required|exists:companies,id',
            'consignor_id' => 'required|exists:consignors,id',
            'consignee_id' => 'required|exists:consignees,id',
            'truck_number' => 'required|string',
            'driver_name' => 'required|string',
            'driver_phone' => 'nullable|string',
            'driver_license' => 'nullable|string',
            'capacity' => 'nullable|numeric|min:0',
            'truck_type' => 'nullable|string',
            'delivery_office_address' => 'required|string',
            'from_location' => 'required|string',
            'to_location' => 'required|string',
            'freight_amount' => 'required|numeric|min:0',
            'payment_mode' => 'required|string',
            'items' => 'required|array|min:1',
            'items.*.package_count' => 'required|integer|min:1',
            'items.*.description' => 'required|string',
            'items.*.amount' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            // Calculate totals
            $freight_amount = $request->freight_amount;
            $igst_amount = ($freight_amount * $request->igst_rate) / 100;
            $cgst_amount = ($freight_amount * $request->cgst_rate) / 100;
            $sgst_amount = ($freight_amount * $request->sgst_rate) / 100;
            $total_amount = $freight_amount + $igst_amount + $cgst_amount + $sgst_amount + 
                           $request->hamali_union + $request->surcharge;

            // Create consignment
            $consignment = Consignment::create([
                'consignment_number' => $request->consignment_number,
                'consignment_date' => $request->consignment_date,
                'company_id' => $request->company_id,
                'consignor_id' => $request->consignor_id,
                'consignee_id' => $request->consignee_id,
                'truck_number' => $request->truck_number,
                'driver_name' => $request->driver_name,
                'driver_phone' => $request->driver_phone,
                'driver_license' => $request->driver_license,
                'capacity' => $request->capacity,
                'truck_type' => $request->truck_type,
                'delivery_office_address' => $request->delivery_office_address,
                'from_location' => $request->from_location,
                'to_location' => $request->to_location,
                'at_owners_risk' => $request->boolean('at_owners_risk'),
                'is_insured' => $request->boolean('is_insured'),
                'insurance_company' => $request->insurance_company,
                'insurance_policy_no' => $request->insurance_policy_no,
                'insurance_amount' => $request->insurance_amount,
                'insurance_date' => $request->insurance_date,
                'insurance_risk' => $request->insurance_risk,
                'freight_amount' => $freight_amount,
                'payment_mode' => $request->payment_mode,
                'igst_rate' => $request->igst_rate ?? 0,
                'cgst_rate' => $request->cgst_rate ?? 0,
                'sgst_rate' => $request->sgst_rate ?? 0,
                'hamali_union' => $request->hamali_union ?? 0,
                'surcharge' => $request->surcharge ?? 0,
                'total_amount' => $total_amount,
                'status' => 'pending',
            ]);

            // Create consignment items
            foreach ($request->items as $item) {
                ConsignmentItem::create([
                    'consignment_id' => $consignment->id,
                    'package_count' => $item['package_count'],
                    'package_type' => $item['package_type'] ?? 'Unit',
                    'description' => $item['description'],
                    'invoice_number' => $item['invoice_number'] ?? null,
                    'invoice_date' => $item['invoice_date'] ?? null,
                    'actual_weight' => $item['actual_weight'] ?? null,
                    'charged_weight' => $item['charged_weight'] ?? null,
                    'weight_type' => $item['weight_type'] ?? 'FTL',
                    'rate_type' => $item['rate_type'] ?? 'FIX',
                    'rate' => $item['rate'] ?? null,
                    'amount' => $item['amount'],
                ]);
            }
        });

        return redirect()->route('admin.consignments.index')
            ->with('success', 'Consignment created successfully.');
    }

    public function show(Consignment $consignment)
    {
        $consignment->load(['company', 'consignor', 'consignee', 'items']);
        return view('admin.consignments.show', compact('consignment'));
    }

    public function edit(Consignment $consignment)
    {
        $companies = Company::where('is_active', true)->get();
        $consignors = Consignor::where('is_active', true)->get();
        $consignees = Consignee::where('is_active', true)->get();
        
        $consignment->load('items');

        return view('admin.consignments.edit', compact('consignment', 'companies', 'consignors', 'consignees'));
    }

    public function update(Request $request, Consignment $consignment)
    {
        $request->validate([
            'consignment_number' => 'required|string|unique:consignments,consignment_number,' . $consignment->id,
            'consignment_date' => 'required|date',
            'company_id' => 'required|exists:companies,id',
            'consignor_id' => 'required|exists:consignors,id',
            'consignee_id' => 'required|exists:consignees,id',
            'truck_number' => 'required|string',
            'driver_name' => 'required|string',
            'driver_phone' => 'nullable|string',
            'driver_license' => 'nullable|string',
            'capacity' => 'nullable|numeric|min:0',
            'truck_type' => 'nullable|string',
            'delivery_office_address' => 'required|string',
            'from_location' => 'required|string',
            'to_location' => 'required|string',
            'freight_amount' => 'required|numeric|min:0',
            'payment_mode' => 'required|string',
            'items' => 'required|array|min:1',
            'items.*.package_count' => 'required|integer|min:1',
            'items.*.description' => 'required|string',
            'items.*.amount' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request, $consignment) {
            // Calculate totals
            $freight_amount = $request->freight_amount;
            $igst_amount = ($freight_amount * $request->igst_rate) / 100;
            $cgst_amount = ($freight_amount * $request->cgst_rate) / 100;
            $sgst_amount = ($freight_amount * $request->sgst_rate) / 100;
            $total_amount = $freight_amount + $igst_amount + $cgst_amount + $sgst_amount + 
                           $request->hamali_union + $request->surcharge;

            // Update consignment
            $consignment->update([
                'consignment_number' => $request->consignment_number,
                'consignment_date' => $request->consignment_date,
                'company_id' => $request->company_id,
                'consignor_id' => $request->consignor_id,
                'consignee_id' => $request->consignee_id,
                'truck_number' => $request->truck_number,
                'driver_name' => $request->driver_name,
                'driver_phone' => $request->driver_phone,
                'driver_license' => $request->driver_license,
                'capacity' => $request->capacity,
                'truck_type' => $request->truck_type,
                'delivery_office_address' => $request->delivery_office_address,
                'from_location' => $request->from_location,
                'to_location' => $request->to_location,
                'at_owners_risk' => $request->boolean('at_owners_risk'),
                'is_insured' => $request->boolean('is_insured'),
                'insurance_company' => $request->insurance_company,
                'insurance_policy_no' => $request->insurance_policy_no,
                'insurance_amount' => $request->insurance_amount,
                'insurance_date' => $request->insurance_date,
                'insurance_risk' => $request->insurance_risk,
                'freight_amount' => $freight_amount,
                'payment_mode' => $request->payment_mode,
                'igst_rate' => $request->igst_rate ?? 0,
                'cgst_rate' => $request->cgst_rate ?? 0,
                'sgst_rate' => $request->sgst_rate ?? 0,
                'hamali_union' => $request->hamali_union ?? 0,
                'surcharge' => $request->surcharge ?? 0,
                'total_amount' => $total_amount,
                'status' => $request->status ?? 'pending',
            ]);

            // Delete existing items and create new ones
            $consignment->items()->delete();
            
            foreach ($request->items as $item) {
                ConsignmentItem::create([
                    'consignment_id' => $consignment->id,
                    'package_count' => $item['package_count'],
                    'package_type' => $item['package_type'] ?? 'Unit',
                    'description' => $item['description'],
                    'invoice_number' => $item['invoice_number'] ?? null,
                    'invoice_date' => $item['invoice_date'] ?? null,
                    'actual_weight' => $item['actual_weight'] ?? null,
                    'charged_weight' => $item['charged_weight'] ?? null,
                    'weight_type' => $item['weight_type'] ?? 'FTL',
                    'rate_type' => $item['rate_type'] ?? 'FIX',
                    'rate' => $item['rate'] ?? null,
                    'amount' => $item['amount'],
                ]);
            }
        });

        return redirect()->route('admin.consignments.index')
            ->with('success', 'Consignment updated successfully.');
    }

    public function destroy(Consignment $consignment)
    {
        $consignment->delete();

        return redirect()->route('admin.consignments.index')
            ->with('success', 'Consignment deleted successfully.');
    }
}

