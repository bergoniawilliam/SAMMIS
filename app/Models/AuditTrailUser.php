<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrailUser extends Model
{
    use HasFactory;
        protected $fillable = [
        'user_id',
        'action',
        'updated_fields',
    ];
    protected $casts = [
        'updated_fields' => 'array',
    ];
}
