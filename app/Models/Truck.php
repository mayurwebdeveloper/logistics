<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'truck_number',
        'driver_name',
        'driver_phone',
        'driver_license',
        'capacity',
        'truck_type',
        'is_active',
    ];

    protected $casts = [
        'capacity' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function consignments()
    {
        return $this->hasMany(Consignment::class);
    }
}

