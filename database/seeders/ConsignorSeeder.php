<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consignor;

class ConsignorSeeder extends Seeder
{
    public function run(): void
    {
        Consignor::create([
            'name' => 'ABC INDUSTRIES PVT LTD',
            'address' => 'Plot No. 123, Industrial Estate, Pune - 411001',
            'phone' => '+91 9876543212',
            'email' => 'contact@abcindustries.com',
            'gst_no' => '27KLMNO9012P3Q4',
            'contact_person' => 'Mr. Rajesh Sharma',
        ]);

        Consignor::create([
            'name' => 'XYZ MANUFACTURING LTD',
            'address' => 'Sector 15, Industrial Area, Gurgaon - 122001',
            'phone' => '+91 9876543213',
            'email' => 'info@xyzmanufacturing.com',
            'gst_no' => '06RSTUV3456W7X8',
            'contact_person' => 'Ms. Priya Patel',
        ]);

        Consignor::create([
            'name' => 'DELHI TRADERS',
            'address' => 'Shop No. 45, Karol Bagh, New Delhi - 110005',
            'phone' => '+91 9876543214',
            'email' => 'sales@delhitraders.com',
            'gst_no' => '07YZABC7890D1E2',
            'contact_person' => 'Mr. Suresh Kumar',
        ]);
    }
}
