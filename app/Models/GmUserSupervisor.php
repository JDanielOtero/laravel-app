<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmUserSupervisor extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'points', 'name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
