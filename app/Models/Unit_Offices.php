<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit_Offices extends Model
{
    use HasFactory;
      protected $table = 'unit_offices';
    
       protected $fillable = [
        'unit_office_name',
        'abbvr',
    ];
}
