<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeComplaint extends Model
{
    use HasFactory;

    protected $table = 'office_complaints';
    protected $primaryKey = 'IDComplaint';

}
