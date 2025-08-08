<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'consignment_number',
        'consignment_date',
        'company_id',
        'consignor_id',
        'consignee_id',
        'truck_number',
        'driver_name',
        'driver_phone',
        'driver_license',
        'capacity',
        'truck_type',
        'delivery_office_address',
        'from_location',
        'to_location',
        'at_owners_risk',
        'is_insured',
        'insurance_company',
        'insurance_policy_no',
        'insurance_amount',
        'insurance_date',
        'insurance_risk',
        'freight_amount',
        'payment_mode',
        'igst_rate',
        'cgst_rate',
        'sgst_rate',
        'hamali_union',
        'surcharge',
        'total_amount',
        'status',
    ];

    protected $casts = [
        'consignment_date' => 'date',
        'insurance_date' => 'date',
        'at_owners_risk' => 'boolean',
        'is_insured' => 'boolean',
        'insurance_amount' => 'decimal:2',
        'freight_amount' => 'decimal:2',
        'igst_rate' => 'decimal:2',
        'cgst_rate' => 'decimal:2',
        'sgst_rate' => 'decimal:2',
        'hamali_union' => 'decimal:2',
        'surcharge' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'capacity' => 'decimal:2',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function consignor()
    {
        return $this->belongsTo(Consignor::class);
    }

    public function consignee()
    {
        return $this->belongsTo(Consignee::class);
    }

    // Truck relationship removed as truck details are now stored directly in consignment

    public function items()
    {
        return $this->hasMany(ConsignmentItem::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}

