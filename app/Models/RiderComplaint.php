<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderComplaint extends Model
{
    use HasFactory;

    protected $table = 'rider_complaints';
    protected $primaryKey = 'IDComplaint';

}
