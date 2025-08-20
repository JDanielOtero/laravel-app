<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmsArea extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'code', 'name', 'lg_costcenter_id'];

    public function LgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function lgPlaces()
    {
        return $this->hasMany(LgPlace::class);
    }
}
