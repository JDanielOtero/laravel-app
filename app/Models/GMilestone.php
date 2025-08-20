<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GMilestone extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'name', 'lg_costcenter_id', 'g_goal_id'];

    public function gGoal()
    {
        return $this->belongsTo(GGoal::class);
    }

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
}
