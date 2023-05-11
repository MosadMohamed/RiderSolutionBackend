<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderLate extends Model
{
    use HasFactory;

    protected $table = 'rider_lates';
    protected $primaryKey = 'IDLate';

    public function Rider()
    {
        return $this->belongsTo(Rider::class, 'IDRider');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'IDCompany');
    }
}
