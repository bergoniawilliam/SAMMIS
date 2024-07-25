<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorcycleReporter extends Model
{
    use HasFactory;
    protected $table = 'motorcycle_reporters';
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
        'created_by_id',
        'updated_by_id', 
    ];
}
