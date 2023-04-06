<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderBlock extends Model
{
    use HasFactory;

    protected $table = 'rider_blocks';
    protected $primaryKey = 'IDRiderBlock';
}
