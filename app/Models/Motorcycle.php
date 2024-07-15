<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\HasAddress;

class Motorcycle extends Model
{
    use HasFactory, HasAddress;
    protected $table = 'motor';
    
       protected $fillable = [
        'blotterno',
        'region',
        'province',
        'municipality',
        'barangay',
        'street',
        'date_time_missing',
        'owner',
        'type',
        'make',
        'model',
        'color',
        'mvfile_number',
        'plate_number',
        'chassis_number',
        'engine_number',
        'status',
        'remarks',
        'station',
    ];
}
