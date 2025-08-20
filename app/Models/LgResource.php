<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgResource extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'lg_mp_id', 'lg_costcenter_id', 'tool', 'price', 'type', 'main_goal', 'clasification_id', 'limit_budget', 'file_url', 'detail', 'rh_worker_id', 'admin_system', 'terms'];

    public function lgMP()
    {
        return $this->belongsTo(LgCostcenter::class, 'lg_mp_id');
    }

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
}
