<?php

namespace App\Models;
use App\Models\Station;
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
        'viewed_motorcycle',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'verified_by_id');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id');
    }
    
}
