<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefRanks extends Model
{
    use HasFactory;
    protected $table = 'ref_ranks';
    
       protected $fillable = [
        'name',
        'abbvr',
    ];
}
