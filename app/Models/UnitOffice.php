<?php

namespace App\Models;
use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitOffice extends Model
{
    use HasFactory;
      protected $table = 'unit_offices';
    
       protected $fillable = [
        'unit_office_name',
        'abbvr',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function stations()
    {
        return $this->hasMany(Station::class);
    }
}
