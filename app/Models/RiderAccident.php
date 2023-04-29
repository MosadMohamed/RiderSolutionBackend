<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderAccident extends Model
{
    use HasFactory;

    protected $table = 'rider_accidents';
    protected $primaryKey = 'IDAccident';
}
