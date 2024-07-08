<?php

namespace App\Models;
use App\Models\RefRank;
use App\Models\Station;
use App\Models\UnitOffice;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'qualifier',
        'rank',
        'station_id',
        'unit_office_id',
         'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function rank()
    {
    return $this->belongsTo(RefRank::class, 'rank');
    }
    
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id');
    }
    
    public function unit_office()
    {
        return $this->belongsTo(UnitOffice::class, 'unit_office_id');
    }
}
