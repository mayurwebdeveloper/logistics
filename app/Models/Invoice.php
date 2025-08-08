<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'consignment_id',
        'invoice_number',
        'invoice_date',
        'invoice_type',
        'file_path',
        'status',
    ];

    protected $casts = [
        'invoice_date' => 'date',
    ];

    public function consignment()
    {
        return $this->belongsTo(Consignment::class);
    }
}

