<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderBreak extends Model
{
    use HasFactory;

    protected $table = 'rider_breaks';
    protected $primaryKey = 'IDBreak';
}
