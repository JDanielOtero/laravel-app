<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemisionGuide extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'date',
        'location_init',
        'location_end',
        'rh_worker_id',
        'guide_type',
        'user_id',
        'user_revision_id',
        'tr_vehicle_id',
        'location_end_text',
        'receiver',
        'weight',
        'json_invoice',
        'status_dialy',
        'sunat_response',
        'sunat_message',
        'licence',
        'note',
        'ubigeo_init',
        'ubigeo_end',
        'transport_date',
        'ticket',
        'rqs_id'
    ];

    public function guides()
    {
        return $this->hasMany(Guide::class);
    }

    public function lgPlace()
    {
        return $this->belongsTo(LgPlace::class, 'location_end');
    }

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trVehicle()
    {
        return $this->belongsTo(TrVehicle::class);
    }
    public function remisionGuideProducts()
    {
        return $this->hasMany(RemisionGuideProduct::class);
    }
    public function lgServiceRequirement()
    {
        return $this->belongsTo(LgServiceRequirement::class, 'rqs_id');
    }
}
