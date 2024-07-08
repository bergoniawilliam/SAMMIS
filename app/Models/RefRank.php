<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefRank extends Model
{
    use HasFactory;
    protected $table = 'ref_ranks';
    
       protected $fillable = [
        'name',
        'abbvr',
    ];
    public function users()
{
    return $this->hasMany(User::class, 'rank');
}
}
