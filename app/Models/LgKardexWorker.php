<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgKardexWorker extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'init_date',
        'final_date',
        'frecuency',
        'frecuency_type',
        'user_id',
        'last_update',
        'next_update',
        'lg_costcenter_id',
        'user_revision_id',
        'user_complete_id',
        'lg_budget_id',
        'mp_id',
        'lg_place_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lgKardexWorkerDetails()
    {
        return $this->hasMany(lgKardexWorkerDetail::class);
    }
    public function lgBudget()
    {
        return $this->belongsTo(LgBudget::class);
    }
    public function user_revision()
    {
        return $this->belongsTo(User::class, 'user_revision_id');
    }
    public function user_complete()
    {
        return $this->belongsTo(User::class, 'user_complete_id');
    }

    public function LgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function lgRequirements()
    {
        return $this->hasMany(LgRequirement::class);
    }
}
