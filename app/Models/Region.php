<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;

class Region extends Model
{
    use HasFactory;
    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
