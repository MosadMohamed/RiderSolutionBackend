<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBlock extends Model
{
    use HasFactory;

    protected $table = 'company_blocks';
    protected $primaryKey = 'IDCompanyBlock';

    public function Rider()
    {
        return $this->belongsTo(Rider::class, 'IDRider');
    }
}
