<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderEmployed extends Model
{
    use HasFactory;

    protected $table = 'rider_employeds';
    protected $primaryKey = 'IDRiderEmployed';
}
