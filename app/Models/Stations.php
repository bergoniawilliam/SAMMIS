<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stations extends Model
{
    use HasFactory;
    protected $table = 'stations';
    
       protected $fillable = [
        'unit_office_id',
        'name',
        
    ];
}
