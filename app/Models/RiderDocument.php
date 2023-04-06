<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderDocument extends Model
{
    use HasFactory;

    protected $table = 'rider_documents';
    protected $primaryKey = 'IDDocument';
}
