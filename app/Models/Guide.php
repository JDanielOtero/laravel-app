<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id',
        'date',
        'arrive_date',
        'validation',
        'note',
        'lg_place_id',
        'departure_date',
        'rh_worker_id',
        'tr_vehicle_id',
        'rh_driver_id',
        'remision_guide_id',
        'packs'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function guideDetails()
    {
        return $this->hasMany(GuideDetail::class);
    }
    public function trVehicle()
    {
        return $this->belongsTo(TrVehicle::class);
    }
    public function lgPlace()
    {
        return $this->belongsTo(LgPlace::class);
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function rhDriver()
    {
        return $this->belongsTo(RhWorker::class, 'rh_driver_id');
    }
    public function remisionGuide()
    {
        return $this->belongsTo(RemisionGuide::class);
    }
}
