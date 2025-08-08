<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consignee;

class ConsigneeSeeder extends Seeder
{
    public function run(): void
    {
        Consignee::create([
            'name' => 'BANGALORE DISTRIBUTORS',
            'address' => 'No. 67, Commercial Street, Bangalore - 560001',
            'phone' => '+91 9876543215',
            'email' => 'orders@bangaloredist.com',
            'gst_no' => '29FGHIJ2345K6L7',
            'contact_person' => 'Mr. Venkatesh Rao',
        ]);

        Consignee::create([
            'name' => 'CHENNAI WHOLESALE MART',
            'address' => 'Plot No. 89, T. Nagar, Chennai - 600017',
            'phone' => '+91 9876543216',
            'email' => 'info@chennaiwholesale.com',
            'gst_no' => '33MNOPQ6789R0S1',
            'contact_person' => 'Ms. Lakshmi Devi',
        ]);

        Consignee::create([
            'name' => 'HYDERABAD ENTERPRISES',
            'address' => 'Road No. 12, Banjara Hills, Hyderabad - 500034',
            'phone' => '+91 9876543217',
            'email' => 'contact@hyderabadent.com',
            'gst_no' => '36TUVWX0123Y4Z5',
            'contact_person' => 'Mr. Ramesh Reddy',
        ]);
    }
}
