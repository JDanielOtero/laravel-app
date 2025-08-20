<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetDoc extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'name',
        'code',
        'company',
        'date_init',
        'date_end',
        'file',
        'external_link',
        'note',
        'owner_id',
        'fleet_authorization_id',
        'tr_vehicle_id',
        'rqf_id',
        'lg_costcenter_id',
        'created_by'
    ];
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
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
    public function fleetAuthorization()
    {
        return $this->belongsTo(FleetAuthorization::class);
    }
    public function rqf()
    {
        return $this->belongsTo(AcPaymentOrder::class, 'rqf_id');
    }
}
