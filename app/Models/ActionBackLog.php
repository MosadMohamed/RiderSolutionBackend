<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionBackLog extends Model
{
    use HasFactory;

    protected $table = 'actionbacklogs';
    protected $primaryKey = 'IDActionBackLog';

    protected $fillable = [
        'UserType', 'IDUser', 'ActionBackLog', 'ActionBackLogDesc'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function Rider()
    {
        return $this->belongsTo(Rider::class, 'IDUser', 'IDRider');
    }
}
