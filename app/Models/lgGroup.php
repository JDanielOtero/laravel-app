<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lgGroup extends Model
{

    use HasFactory;
    protected $fillable = ['status', 'name'];

    public function lgCostcenters()
    {
        return $this->belongsToMany(LgCostcenter::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
