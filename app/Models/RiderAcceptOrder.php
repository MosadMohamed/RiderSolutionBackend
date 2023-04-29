<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderAcceptOrder extends Model
{
    use HasFactory;

    protected $table = 'rider_accept_order';
    protected $primaryKey = 'IDAccept';
}
