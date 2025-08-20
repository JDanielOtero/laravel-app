<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgServiceRequirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id',
        'user_revision_id',
        'user_accept_id',
        'date',
        'priority',
        'note',
        'location',
        'lg_place_id',
        'discipline_type',
        'speciality_type',
        'revision_date',
        'g_order_id',
        'type',
        'name',
        'lg_costcenter_id',
        'code',
        'lg_service_id',
        'mp_assitant_id',
        'lg_budget_id',
        'pr_line_id',
        'lg_supplier_id',
        'origin_type',
        'file',
        'pms_facility_id',
        'pms_area_id',
        'revision_date_rq',
        'revision_percent_rq',
        'total_cost',
        'prev_status',
        'status_changed',
        'rh_finding_id',
        'rh_worker_id',
        'lg_product_id',
        'rh_worker_manager',
        'details',
        'old_lg_service_id',
        'reject_reason'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userRevision()
    {
        return $this->belongsTo(User::class, 'user_revision_id');
    }
    public function userAccept()
    {
        return $this->belongsTo(User::class, 'user_accept_id');
    }
    public function lgBudget()
    {
        return $this->hasOne(LgBudget::class);
    }
    public function lgPlace()
    {
        return $this->belongsTo(LgPlace::class);
    }
    public function gOrder()
    {
        return $this->belongsTo(GOrder::class);
    }
    public function serviceChks()
    {
        return $this->hasMany(ServiceChk::class);
    }

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function lgRequirements()
    {
        return $this->hasMany(LgRequirement::class);
    }
    public function lgService()
    {
        return $this->hasMany(lgService::class);
    }
    public function pmsFacility()
    {
        return $this->belongsTo(PmsFacility::class);
    }
    public function pmsArea()
    {
        return $this->belongsTo(PmsArea::class);
    }
    public function sgManufacturing()
    {
        return $this->hasOne(SgManufacturing::class);
    }

    public function lgServiceRequirementHistoricals()
    {
        return $this->hasMany(LgServiceRequirementHistorical::class);
    }

    public function rhFinding()
    {
        return $this->belongsTo(RhFinding::class);
    }
    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function lgSupplier()
    {
        return $this->belongsTo(LgSupplier::class);
    }
    public function rhWorkerManager()
    {
        return $this->belongsTo(RhWorker::class, 'rh_worker_manager');
    }
    public function mp()
    {
        return $this->belongsTo(LgCostcenter::class, 'mp_assitant_id');
    }
    public function lgServiceRequirementWorkers()
    {
        return $this->hasMany(LgServiceRequirementWorker::class);
    }
    public function acPaymentOrders()
    {
        return $this->hasMany(AcPaymentOrder::class);
    }

    public function sgManufacturingWorkers()
    {
        return $this->hasMany(SgManufacturingWorker::class);
    }
}
