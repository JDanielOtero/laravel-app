<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppChat extends Model
{
    use HasFactory;
    protected $fillable = [
        'chat',
        'type',
        'user_id',
        'file'
    ];
}
