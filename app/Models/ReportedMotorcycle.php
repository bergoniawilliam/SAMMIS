<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedMotorcycle extends Model
{
    use HasFactory;
    protected $table = 'reported_motorcycles';
    
     protected $fillable = [
        'blotter_number',
        'plate_number',
        'mvfile_number',
        'chassis_number',
        'engine_number',
        'region',
        'province',
        'municipality',
        'barangay',
        'street',
        'date_time_missing',
        'motorcycle_reporters_id',
        'reported_motorcycle_owners_id', 
        'type',
        'make',
        'model',
        'color',
        'ioc',
        'station_id',
        'created_by_id',
        'updated_by_id',  
    ];
}
