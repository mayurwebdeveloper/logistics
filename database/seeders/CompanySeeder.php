<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'name' => 'SHREE GANESH TRANSPORT',
            'subtitle' => 'Reliable Logistics Solutions',
            'head_office_address' => 'Shop No. 12, Transport Nagar, Mumbai - 400001',
            'email' => 'info@ganeshtrnsport.com',
            'mobile_numbers' => json_encode(['+91 9876543210', '+91 9876543211']),
            'gstin' => '27ABCDE1234F1Z5',
            'msme_no' => 'UDYAM-MH-12-0001234',
            'bank_name' => 'State Bank of India',
            'account_name' => 'SHREE GANESH TRANSPORT',
            'account_number' => '12345678901234',
            'ifsc_code' => 'SBIN0001234',
            'jurisdiction' => 'Mumbai Central',
            'is_active' => true,
        ]);

        Company::create([
            'name' => 'MUMBAI LOGISTICS PVT LTD',
            'subtitle' => 'Express Delivery Services',
            'head_office_address' => 'Plot No. 45, Industrial Area, Andheri East, Mumbai - 400069',
            'email' => 'contact@mumbailogistics.com',
            'mobile_numbers' => json_encode(['+91 9876543212', '+91 9876543213']),
            'gstin' => '27FGHIJ5678K2L6',
            'msme_no' => 'UDYAM-MH-12-0005678',
            'bank_name' => 'HDFC Bank',
            'account_name' => 'MUMBAI LOGISTICS PVT LTD',
            'account_number' => '56789012345678',
            'ifsc_code' => 'HDFC0005678',
            'jurisdiction' => 'Mumbai East',
            'is_active' => true,
        ]);
    }
}
