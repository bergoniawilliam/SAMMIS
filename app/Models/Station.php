<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $table = 'stations';
    
       protected $fillable = [
        'unit_office_id',
        'name',
        
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
   
}
