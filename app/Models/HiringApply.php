<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiringApply extends Model
{
    use HasFactory;

    protected $table = 'hiring_applies';
    protected $primaryKey = 'IDHiringApply';
}
