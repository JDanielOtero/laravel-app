<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgSupplier extends Model
{

    use HasFactory;
    protected $fillable = [
        'status',
        'name',
        'document_number',
        'puntaje',
        'alias',
        'phase',
        'pr_line_id',
        'type',
        'sunat_date',
        'activity_date',
        'mp_id',
        'document_type',
        'profile_url',
        'deduction_acount',
        'discipline_1',
        'range',
        'pr_category_id',
        'pr_subcategory_id',
        'holding_agent',
        'good_taxpayer'
    ];
    public function setDocumentNumberAttribute($value)
    {
        $this->attributes['document_number'] = preg_replace('/\s+/', '', $value);
    }

    public function rhBanks()
    {
        return $this->morphMany(RhBank::class, 'table')->where('status','A');
    }
    public function lgRequirementDetails()
    {
        return $this->hasMany(LgRequirementDetail::class, 'supplier_ruc', 'document_number');
    }
    public function prLine()
    {
        return $this->belongsTo(PrLine::class);
    }
    public function prCategory()
    {
        return $this->belongsTo(PrCategory::class);
    }
    public function lgMP()
    {
        return $this->belongsTo(LgCostcenter::class, 'mp_id');
    }
    public function rhContracts()
    {
        return $this->morphMany(RhContract::class, 'table');
    }

    public function rhContacts()
    {
        return $this->morphMany(RhContact::class, 'table')->where('status', 'A');
    }
    public function lgPlaces()
    {
        return $this->morphMany(LgPlace::class, 'table')->where('status', 'A');
    }
    public function rhSocialnetworks()
    {
        return $this->morphMany(RhSocialnetwork::class, 'table');
    }
    public function rhSos()
    {
        return $this->morphMany(RhSo::class, 'table')->where('status', 'A');
    }

    public function rhAuthorizations()
    {
        return $this->morphMany(RhAuthorization::class, 'table')->where('status', 'A');
    }

    public function acPaymentsOrders()
    {
        return $this->hasMany(AcPaymentOrder::class, 'supplier_ruc', 'document_number');
    }
    public function lgServiceRequirements()
    {
        return $this->hasMany(LgServiceRequirement::class);
    }
}
