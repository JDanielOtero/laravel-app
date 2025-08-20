<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhAuthorization extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', 'table_type', 'table_id', 'category', 'description', 'licence_category', 'licence_date', 'due_date',
        'fotocheck_number', 'lg_costcenter_id', 'fotocheck_status', 'last_um', 'fotocheck_url', 'licence_url', 'record_url',
        'months_renew', 'cap_url', 'licence_type', 'req_type', 'condition', 'tr_vehicle_id', 'created_by', 'updated_by'
    ];

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }

    public function table()
    {
        return $this->morphTo();
    }

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class, 'table_id')->where('table_type', RhWorker::class);
    }
    public function lgSupplier()
    {
        return $this->belongsTo(LgSupplier::class, 'table_id')->where('table_type', LgSupplier::class);
    }
    public function trVehicle()
    {
        return $this->belongsTo(TrVehicle::class);
    }
    public function months()
    {
        try {
            $fecha1 = date_create($this->due_date);
            $fecha2 = date_create(date('Y-m-d'));
            $interval = date_diff($fecha2, $fecha1);

            $dias = $interval->days;
            $meses = floor($dias / 30);
            $dias_restantes = $dias % 30;

            $badge_class = $meses == 0 ? 'bg-danger' : 'bg-success';

            return '<span class="badge ' . $badge_class . '">' . $meses . ' meses ' . $dias_restantes . ' días</span>';
        } catch (Exception $e) {
            return '<span class="badge bg-danger">Error</span>';
        }
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
