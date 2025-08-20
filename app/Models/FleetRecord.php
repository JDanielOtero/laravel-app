<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class FleetRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'lg_costcenter_id',
        'rh_worker_id',
        'user_id',
        'date',
        'tr_vehicle_id',
        'km_init',
        'km_end',
        'km_diff',
        'orden_trabajo_file',
        'manifesto_personal_file',
        'control_fatiga_file',
        'altitud_conductores_file',
        'iperc_continuo_file',
        'plan_izaje_file',
        'inspeccion_preuso_file',
        'monitoreo_viento_file',
        'bitacora_diaria_file',
        'checklist_gruas_file',
        'verificacion_semanal_file',
        'trabajo_altura_file',
        'sleep_hours',
        'sleep_percentage',
        'sleep_monitoring_file',
        'alcohol_test',
        'alcohol_file',
        'rqt_id',
        'type',
        'check',
        'lg_supplier_id',
        'service_file',
        'service_conformity_file',
        'service_conformity_rating',
        'rqs_id',
        'operative_control',
        'operative_file',
        'operative_note',
        'guide_id'

    ];

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
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
    public function fleetRecordFiles()
    {
        return $this->hasMany(FleetRecordFile::class);
    }
    public function rqt()
    {
        return $this->belongsTo(Rqt::class);
    }
    public function lgSupplier()
    {
        return $this->hasMany(LgSupplier::class);
    }
    public function rqs()
    {
        return $this->belongsTo(LgServiceRequirement::class, 'rqs_id');
    }
}
