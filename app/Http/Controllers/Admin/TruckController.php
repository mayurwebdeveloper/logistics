<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Truck::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('truck_number', 'like', "%{$search}%")
                  ->orWhere('driver_name', 'like', "%{$search}%")
                  ->orWhere('driver_phone', 'like', "%{$search}%")
                  ->orWhere('driver_license', 'like', "%{$search}%");
            });
        }

        // Filter by truck type
        if ($request->filled('truck_type')) {
            $query->where('truck_type', $request->truck_type);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }

        $trucks = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.trucks.index', compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trucks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'truck_number' => 'required|string|max:255|unique:trucks,truck_number',
            'driver_name' => 'required|string|max:255',
            'driver_phone' => 'nullable|string|max:20',
            'driver_license' => 'nullable|string|max:255',
            'capacity' => 'nullable|numeric|min:0',
            'truck_type' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Truck::create($request->all());
            return redirect()->route('admin.trucks.index')
                ->with('success', 'Truck created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to create truck. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $truck = Truck::findOrFail($id);
        return view('admin.trucks.show', compact('truck'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $truck = Truck::findOrFail($id);
        return view('admin.trucks.edit', compact('truck'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $truck = Truck::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'truck_number' => 'required|string|max:255|unique:trucks,truck_number,' . $id,
            'driver_name' => 'required|string|max:255',
            'driver_phone' => 'nullable|string|max:20',
            'driver_license' => 'nullable|string|max:255',
            'capacity' => 'nullable|numeric|min:0',
            'truck_type' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $truck->update($request->all());
            return redirect()->route('admin.trucks.index')
                ->with('success', 'Truck updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update truck. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $truck = Truck::findOrFail($id);

        try {
            // Check if truck has associated consignments
            if ($truck->consignments()->count() > 0) {
                return redirect()->route('admin.trucks.index')
                    ->with('error', 'Cannot delete truck. It has associated consignments.');
            }

            $truck->delete();
            return redirect()->route('admin.trucks.index')
                ->with('success', 'Truck deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.trucks.index')
                ->with('error', 'Failed to delete truck. Please try again.');
        }
    }
}
