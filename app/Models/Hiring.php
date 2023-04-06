<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiring extends Model
{
    use HasFactory;

    protected $table = 'hirings';
    protected $primaryKey = 'IDHiring';

    public function Company()
    {
        return $this->belongsTo(Company::class, 'IDCompany');
    }
}
