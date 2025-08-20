<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GGoal extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'code', 'name', 'lg_budget_id', 'indicator', 'code_indicator'];

    public function gMilestones()
    {
        return $this->hasMany(GMilestone::class);
    }

    public function gPhases()
    {
        return $this->hasMany(GPhase::class);
    }
    public function lgBudget()
    {
        return $this->belongsTo(lgBudget::class);
    }
    public function total()
    {
        return $this->gPhases->sum(function ($phase) {
            return $phase->total();
        });
    }
}
