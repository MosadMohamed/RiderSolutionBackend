<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use League\CommonMark\Node\Block\Document;

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

    public function Office()
    {
        return $this->belongsTo(Office::class, 'IDOffice');
    }

    public function Country()
    {
        return $this->belongsTo(Country::class, 'IDCountry');
    }

    public function Documents()
    {
        return $this->hasMany(RiderDocument::class, 'IDRider');
    }

    public function CompanyWorking()
    {
        return $this->belongsTo(Company::class, 'RiderCompanyWorking');
    }
}
