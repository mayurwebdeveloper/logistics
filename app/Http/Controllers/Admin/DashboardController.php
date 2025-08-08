<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consignment;
use App\Models\Consignor;
use App\Models\Consignee;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_consignments' => Consignment::count(),
            'pending_consignments' => Consignment::where('status', 'pending')->count(),
            'in_transit_consignments' => Consignment::where('status', 'in_transit')->count(),
            'delivered_consignments' => Consignment::where('status', 'delivered')->count(),
            'total_trucks' => Consignment::whereNotNull('truck_number')->distinct()->count('truck_number'),
            'total_consignors' => Consignor::where('is_active', true)->count(),
            'total_consignees' => Consignee::where('is_active', true)->count(),
            'total_invoices' => Invoice::count(),
        ];

        $recent_consignments = Consignment::with(['consignor', 'consignee'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_consignments'));
    }
}
