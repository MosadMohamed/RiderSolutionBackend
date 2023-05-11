<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderAcceptOrder extends Model
{
    use HasFactory;

    protected $table = 'rider_accept_order';
    protected $primaryKey = 'IDAccept';

    public function Rider()
    {
        return $this->belongsTo(Rider::class, 'IDRider');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'IDCompany');
    }
}
