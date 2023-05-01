<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderAbsence extends Model
{
    use HasFactory;

    protected $table = 'rider_absences';
    protected $primaryKey = 'IDAbsence';
}