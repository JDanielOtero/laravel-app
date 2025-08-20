<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmsRequirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'client_id',
        'pms_base_id',
        'pms_area_id',
        'pms_location_id',
        'pms_facility_id',
        'specific_location',
        'type',
        'description',
        'quantity',
        'lg_costcenter_id',
        'file_url',
        'user_id',
        'user_revision_id',
        'user_accept_id',
        'date',
        'init_date',
        'final_date',
        'priority',
        'tentative_date',
        'percentage',
        'lg_service_id',
        'mp_assitant_id',
        'lg_supplier_id',
        'origin_type',
        'lg_product_id',
        'rh_finding_id',
        'lg_place_id',
        'old_lg_service_id',
        'area_type',
        'lg_budget_id',
        'qr'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function pmsBase()
    {
        return $this->belongsTo(PmsBase::class);
    }
    public function pmsArea()
    {
        return $this->belongsTo(PmsArea::class);
    }

    public function pmsLocation()
    {
        return $this->belongsTo(PmsLocation::class);
    }
    public function pmsFacility()
    {
        return $this->belongsTo(PmsFacility::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function userRevision()
    {
        return $this->belongsTo(User::class, 'user_revision_id');
    }
    public function userAccept()
    {
        return $this->belongsTo(User::class, 'user_accept_id');
    }

    public function pmsRequirementWorkers()
    {
        return $this->hasMany(PmsRequirementWorker::class);
    }
    public function lgService()
    {
        return $this->belongsTo(lgService::class);
    }
    public function lgSupplier()
    {
        return $this->belongsTo(LgSupplier::class);
    }
    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function lgPlace()
    {
        return $this->belongsTo(LgPlace::class);
    }
    public function lgBudget()
    {
        return $this->belongsTo(LgBudget::class);
    }
}
