<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetMaintenance extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_by',
        'tr_vehicle_id',
        'type',
        'status',
        'km_init',
        'km_end',
        'date_planned',
        'date_real',
        'file',
        'fleet_type',
        'place',
        'matrix_house',
        'lg_costcenter_id',
    ];
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function trVehicle()
    {
        return $this->belongsTo(TrVehicle::class);
    }
    public function fleetMaintenanceFiles()
    {
        return $this->hasMany(FleetMaintenanceFile::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
}
