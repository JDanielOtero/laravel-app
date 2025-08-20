<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rqt extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_by',
        'status',
        'lg_costcenter_id',
        'client_id',
        'tr_vehicle_id',
        'type',
        'date_init',
        'date_end',
        'note',
        'file',
        'description',
        'place',
        'rq_type',
        'currency',
        'fx_rate',
        'price_hour',
        'hours_rq',
        'hours_real',
        'total_cost'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function trVehicle()
    {
        return $this->belongsTo(TrVehicle::class);
    }
    public function rqtFiles()
    {
        return $this->hasMany(RqtFile::class);
    }
    public function fleetRecords()
    {
        return $this->hasMany(FleetRecord::class);
    }
}
