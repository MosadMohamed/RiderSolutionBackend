<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskApply extends Model
{
    use HasFactory;

    protected $table = 'task_applies';
    protected $primaryKey = 'IDTaskApply';

    public function Rider()
    {
        return $this->belongsTo(Rider::class, 'IDRider');
    }
}
