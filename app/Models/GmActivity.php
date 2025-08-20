<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmActivity extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'name', 'points','py','sp','categoria'];
    public function gmUserActivities()
    {
        return $this->hasMany(GmUserActivity::class);
    }
}
