<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Office extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'offices';
    protected $primaryKey = 'IDOffice';

    protected $hidden = [
        'OfficePassword',
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
