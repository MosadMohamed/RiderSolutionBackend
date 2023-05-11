<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeMember extends Model
{
    use HasFactory;

    protected $table = 'office_members';
    protected $primaryKey = 'IDOfficeMember';
}
