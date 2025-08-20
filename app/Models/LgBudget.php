<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgBudget extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'name',
        'lg_costcenter_id',
        'user_id',
        'g_order_id',
        'main_goal',
        'clasification',
        'limit_budget',
        'file_url',
        'detail',
        'rh_worker_id',
        'admin_system',
        'terms',
        'lg_service_requirement_id',
        'equipe_amount',
        'material_amount',
        'subcontract_amount',
        'jobforce_amount',
        'currency',
        'fx_rate',
        'meta_rate',
        'internal_type',
        'level'
    ];

    public function gGoals()
    {
        return $this->hasMany(GGoal::class);
    }
    public function lgSubresources()
    {
        return $this->hasMany(LgSubresource::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lgBudgetDetails()
    {
        return $this->hasMany(LgBudgetDetail::class)->whereNull('lg_budget_item_id');
    }
    public function lgBudgetDetailServices()
    {
        return $this->hasMany(lgBudgetDetailService::class)->whereNull('lg_budget_item_id');
    }

    public function lgBudgetDetailPps()
    {
        return $this->hasMany(LgBudgetDetailPp::class)->whereNull('lg_budget_item_id');
    }
    public function lgBudgetDetailsComplete()
    {
        return $this->hasMany(LgBudgetDetail::class);
    }
    public function lgBudgetDetailServicesComplete()
    {
        return $this->hasMany(lgBudgetDetailService::class);
    }

    public function lgBudgetDetailPpsComplete()
    {
        return $this->hasMany(LgBudgetDetailPp::class);
    }
    public function gOrder()
    {
        return $this->belongsTo(GOrder::class);
    }
    public function lgServiceRequirement()
    {
        return $this->belongsTo(LgServiceRequirement::class);
    }
    public function acPaymentOrders()
    {
        return $this->hasMany(AcPaymentOrder::class);
    }

    public function lgBudgetLevels()
    {
        return $this->hasMany(LgBudgetLevel::class);
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function lgBudgetItems()
    {
        return $this->hasMany(LgBudgetItem::class);
    }
}
