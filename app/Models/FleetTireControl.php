<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetTireControl extends Model
{
    use HasFactory;
    protected $fillable  = [
        'status',
        'created_by',
        'tr_vehicle_id',
        'lg_costcenter_id',
        'tire_internal_code',
        'tire_current_condition',
        'tire_price',
        'tire_lifetime',
        'tire_current_km',
        'tire_percent_used',
        'tire_rotation',
        'cocada_internal',
        'cocada_central',
        'cocada_external',
        'codada_meter_code',
        'air_meter_code',
        'tire_brand',
        'tire_model',
        'tire_supplier_id',
        'instalation_date',
        'instalation_km',
        'instalation_price',
        'instalation_decition',
        'tire_psi',
        'inspection_date',
        'file'
    ];
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function trVehicle()
    {
        return $this->belongsTo(TrVehicle::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function supplier()
    {
        return $this->belongsTo(LgSupplier::class, 'tire_supplier_id');
    }
}
