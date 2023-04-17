<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderRequest extends Model
{
    use HasFactory;

    protected $table = 'rider_requests';
    protected $primaryKey = 'IDRiderRequest';

    public function Company()
    {
        return $this->belongsTo(Company::class, 'IDCompany');
    }

    public function Rider()
    {
        return $this->belongsTo(Rider::class, 'IDRider');
    }
}
