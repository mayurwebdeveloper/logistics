<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Truck;

class TruckSeeder extends Seeder
{
    public function run(): void
    {
        Truck::create([
            'truck_number' => 'MH 12 AB 1234',
            'driver_name' => 'Rajesh Kumar',
            'driver_phone' => '+91 9876543218',
            'driver_license' => 'MH1220230001234',
            'capacity' => 10.00,
            'truck_type' => 'box_truck',
            'is_active' => true,
        ]);

        Truck::create([
            'truck_number' => 'MH 14 CD 5678',
            'driver_name' => 'Suresh Patil',
            'driver_phone' => '+91 9876543219',
            'driver_license' => 'MH1420230005678',
            'capacity' => 15.00,
            'truck_type' => 'flatbed',
            'is_active' => true,
        ]);

        Truck::create([
            'truck_number' => 'GJ 01 EF 9012',
            'driver_name' => 'Amit Shah',
            'driver_phone' => '+91 9876543220',
            'driver_license' => 'GJ0120230009012',
            'capacity' => 20.00,
            'truck_type' => 'trailer',
            'is_active' => true,
        ]);

        Truck::create([
            'truck_number' => 'KA 03 GH 3456',
            'driver_name' => 'Ravi Sharma',
            'driver_phone' => '+91 9876543221',
            'driver_license' => 'KA0320230003456',
            'capacity' => 8.00,
            'truck_type' => 'refrigerated',
            'is_active' => true,
        ]);

        Truck::create([
            'truck_number' => 'DL 07 IJ 7890',
            'driver_name' => 'Priya Singh',
            'driver_phone' => '+91 9876543222',
            'driver_license' => 'DL0720230007890',
            'capacity' => 12.00,
            'truck_type' => 'dump_truck',
            'is_active' => true,
        ]);

        Truck::create([
            'truck_number' => 'TN 33 KL 2345',
            'driver_name' => 'Mohan Reddy',
            'driver_phone' => '+91 9876543223',
            'driver_license' => 'TN3320230002345',
            'capacity' => 5.00,
            'truck_type' => 'pickup',
            'is_active' => false,
        ]);
    }
}
