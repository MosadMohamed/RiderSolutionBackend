<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingBackLog extends Model
{
    use HasFactory;

    protected $table = 'workingbacklogs';
    protected $primaryKey = 'IDWorkingBackLog';

    protected $fillable = [
        'IDCompany', 'IDRider', 'WorkingBackLogDate', 'WorkingBackLogType', 'WorkingBackLogActive'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
