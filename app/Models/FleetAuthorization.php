<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetAuthorization extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'type',
        'note',
        'created_by',
        'tr_vehicle_id'
    ];
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function trVehicle()
    {
        return $this->belongsTo(TrVehicle::class);
    }
    public function fleetDocs()
    {
        return $this->hasMany(FleetDoc::class);
    }
}
