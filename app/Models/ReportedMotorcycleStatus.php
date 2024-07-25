<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedMotorcycleStatus extends Model
{
    use HasFactory;
     protected $table = 'reported_motorcycle_statuses';
     protected $fillable = [
        'reported_motorcycles_id',
        'status',
        'remarks',
        'created_by_id',
        'updated_by_id', 
    ];
}
