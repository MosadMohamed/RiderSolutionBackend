<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderFeedback extends Model
{
    use HasFactory;

    protected $table = 'rider_feedbacks';
    protected $primaryKey = 'IDFeedback';
}
