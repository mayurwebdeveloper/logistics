<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gst_no',
        'address',
        'mobile_no',
        'second_person_name',
        'mobile_no2',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function consignments()
    {
        return $this->hasMany(Consignment::class);
    }
}
