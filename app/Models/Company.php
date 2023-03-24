<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'companies';
    protected $primaryKey = 'IDCompany';

    protected $hidden = [
        'CompanyPassword',
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
