<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Rider extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'riders';
    protected $primaryKey = 'IDRider';

    protected $hidden = [
        'RiderPassword',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
