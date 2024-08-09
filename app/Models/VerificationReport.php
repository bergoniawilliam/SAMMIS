<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationReport extends Model
{
    use HasFactory;
    protected $table = 'verification_reports';
     protected $fillable = [
        'verified_by_id',
        'station_id',
        'search_fields',
        'location',
       
    ];
}
