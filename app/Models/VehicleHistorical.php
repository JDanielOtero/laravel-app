<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleHistorical extends Model
{
    use HasFactory;
    protected $fillable = ['lg_supplier_id', 'file', 'end_date', 'status', 'type', 'tr_vehicle_id'];

    public function lgSupplier()
    {
        return $this->belongsTo(LgSupplier::class);
    }

    public function trVehicle()
    {
        return $this->belongsTo(TrVehicle::class);
    }
}
