<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsignmentItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'consignment_id',
        'package_count',
        'package_type',
        'description',
        'invoice_number',
        'invoice_date',
        'actual_weight',
        'charged_weight',
        'weight_type',
        'rate_type',
        'rate',
        'amount',
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'actual_weight' => 'decimal:2',
        'charged_weight' => 'decimal:2',
        'rate' => 'decimal:2',
        'amount' => 'decimal:2',
    ];

    public function consignment()
    {
        return $this->belongsTo(Consignment::class);
    }
}

