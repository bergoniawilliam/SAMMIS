<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedMotorcycleOwner extends Model
{
    use HasFactory;
    protected $table = 'reported_motorcycle_owners';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'qualifier',
        'cellphone_number',
        'region',
        'province',
        'municipality',
        'barangay',
        'street',
        'home_unit_number',
    ];
}
