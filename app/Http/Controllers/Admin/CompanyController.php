<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Company::query();

        // Search functionality
        if (request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('gst_no', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('mobile_no', 'like', "%{$search}%")
                  ->orWhere('second_person_name', 'like', "%{$search}%")
                  ->orWhere('mobile_no2', 'like', "%{$search}%");
            });
        }

        // Status filter
        if (request('status') !== null && request('status') !== '') {
            $query->where('is_active', request('status'));
        }

        $companies = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gst_no' => 'nullable|string|max:255',
            'address' => 'required|string',
            'mobile_no' => 'required|string|max:20',
            'second_person_name' => 'nullable|string|max:255',
            'mobile_no2' => 'nullable|string|max:20',
        ]);

        Company::create([
            'name' => $request->name,
            'gst_no' => $request->gst_no,
            'address' => $request->address,
            'mobile_no' => $request->mobile_no,
            'second_person_name' => $request->second_person_name,
            'mobile_no2' => $request->mobile_no2,
            'is_active' => true,
        ]);

        return redirect()->route('admin.companies.index')
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gst_no' => 'nullable|string|max:255',
            'address' => 'required|string',
            'mobile_no' => 'required|string|max:20',
            'second_person_name' => 'nullable|string|max:255',
            'mobile_no2' => 'nullable|string|max:20',
        ]);

        $company->update([
            'name' => $request->name,
            'gst_no' => $request->gst_no,
            'address' => $request->address,
            'mobile_no' => $request->mobile_no,
            'second_person_name' => $request->second_person_name,
            'mobile_no2' => $request->mobile_no2,
        ]);

        return redirect()->route('admin.companies.index')
            ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        // Check if company has any consignments
        if ($company->consignments()->count() > 0) {
            return redirect()->route('admin.companies.index')
                ->with('error', 'Cannot delete company. It has associated consignments.');
        }

        $company->delete();

        return redirect()->route('admin.companies.index')
            ->with('success', 'Company deleted successfully.');
    }
}
