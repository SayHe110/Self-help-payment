<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'password', 'email', 'nickname', 'avatar',
        'dormitory_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function dormitory()
    {
        return $this->belongsTo(Dormitory::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
