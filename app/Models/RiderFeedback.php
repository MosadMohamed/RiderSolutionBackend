<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderFeedback extends Model
{
    use HasFactory;

    protected $table = 'rider_feedbacks';
    protected $primaryKey = 'IDFeedback';

    public function Rider()
    {
        return $this->belongsTo(Rider::class, 'IDRider');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'IDCompany');
    }
}
