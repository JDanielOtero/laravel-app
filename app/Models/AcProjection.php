<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcProjection extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_init_date',
        'costcenter_administrator',
        'costcenter_owner',
        'costcenter_project',
        'rqf_type',
        'capex_opex',
        'quantity',
        'price',
        'frecuency',
        'init_date',
        'end_date',
        'class',
        'class_type',
        'lg_budget_id'
    ];

    public function ccAdmin()
    {
        return $this->belongsTo(LgCostcenter::class, 'costcenter_administrator');
    }
    public function ccOwner()
    {
        return $this->belongsTo(LgCostcenter::class, 'costcenter_owner');
    }
    public function ccProject()
    {
        return $this->belongsTo(LgCostcenter::class, 'costcenter_project');
    }
    public function acPaymentOrders()
    {
        return $this->hasMany(AcPaymentOrder::class);
    }
}
