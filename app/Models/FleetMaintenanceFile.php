<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetMaintenanceFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'fleet_maintenance_id',
        'code',
        'description',
        'file',
        'file_name'
    ];

    public function fleetMaintenance()
    {
        return $this->belongsTo(FleetMaintenance::class);
    }
}
