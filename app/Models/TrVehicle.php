<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'plate',
        'type',
        'lg_product_id',
        'fuel',
        'VIN',
        'version',
        'sits',
        'power',
        'p_bruto',
        'p_neto',
        'carga_util',
        'useful_life',
        'calibration_price',
        'maintenace_price',
        'depreciation',
        'hour_fee',
        'voltage',
        'year',
        'matrix_house',
        'concesionario',
        'model_year',
        'n_motor',
        'chasis_serie',
        'bodywork',
        'cylinder_capacity',
        'motor_potence',
        'ejes',
        'tires',
        'length',
        'height',
        'width',
        'rearview_camera',
        'tracklog_system',
        'tr_vehicle_type_id'

    ];

    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function fleetRecords()
    {
        return $this->hasMany(FleetRecord::class);
    }
    public function fleetMaintenances()
    {
        return $this->hasMany(FleetMaintenance::class);
    }
    public function fleetTireControls()
    {
        return $this->hasMany(FleetTireControl::class);
    }
    public function trVehicleType()
    {
        return $this->belongsTo(TrVehicleType::class);
    }
}
