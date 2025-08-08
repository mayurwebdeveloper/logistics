<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consignor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsignorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Consignor::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('gst_no', 'like', "%{$search}%")
                  ->orWhere('contact_person', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }

        $consignors = $query->orderBy('name')->paginate(10);
        return view('admin.consignors.index', compact('consignors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.consignors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'gst_no' => 'nullable|string|max:50',
            'contact_person' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Consignor::create($request->all());
            return redirect()->route('admin.consignors.index')
                ->with('success', 'Consignor created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to create consignor. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consignor = Consignor::findOrFail($id);
        return view('admin.consignors.show', compact('consignor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $consignor = Consignor::findOrFail($id);
        return view('admin.consignors.edit', compact('consignor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $consignor = Consignor::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'gst_no' => 'nullable|string|max:50',
            'contact_person' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $consignor->update($request->all());
            return redirect()->route('admin.consignors.index')
                ->with('success', 'Consignor updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update consignor. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $consignor = Consignor::findOrFail($id);

        try {
            // Check if consignor has any consignments
            if ($consignor->consignments()->count() > 0) {
                return redirect()->route('admin.consignors.index')
                    ->with('error', 'Cannot delete consignor. They have associated consignments.');
            }

            $consignor->delete();
            return redirect()->route('admin.consignors.index')
                ->with('success', 'Consignor deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.consignors.index')
                ->with('error', 'Failed to delete consignor. Please try again.');
        }
    }
}
