<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHistorical extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role_id',
        'date',
        'lg_costcenter_id',
        'jobprofile_id',
    ];
}
