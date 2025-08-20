<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rqf extends Model
{

    use HasFactory;
    protected $fillable = [
        'rqf_type',
        'interest_group',
        'status',
        'created_by',
        'reviewed_by',
        'closed_by',
        'concept',
        'lg_costcenter_id',
        'beneficiary_type',
        'beneficiary_id',
        'beneficiary_search',
        'rh_bank_id',
        'due_date',
        'priority',
        'budget_type',
        'lg_budget_id',
        'currency',
        'fx_rate',
        'original_amount',
        'sub_total',
        'igv',
        'total',
        'payment_method',
        'has_expedient',
        'general_file',
        'vaucher_file',
        'payment_file',
        'doc_delivered',
        'fund_id'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function reviewedBy()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
    public function closedBy()
    {
        return $this->belongsTo(User::class, 'closed_by');
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function beneficiary()
    {
        return $this->morphTo();
    }
    public function lgBudget()
    {
        return $this->belongsTo(LgBudget::class);
    }

    public function rqss()
    {
        $ids = $this->hasMany(RqfLink::class)
            ->where('link_type', 'RQS')
            ->pluck('link_id');

        return LgServiceRequirement::whereIn('id', $ids)->get();
    }

    public function rqps()
    {
        $ids = $this->hasMany(RqfLink::class)
            ->where('link_type', 'RQP')
            ->pluck('link_id');

        return RhRequirementDetail::whereIn('id', $ids)->get();
    }

    public function rqas()
    {
        $ids = $this->hasMany(RqfLink::class)
            ->where('link_type', 'RQA-ITEM')
            ->pluck('link_id');

        return LgRequirementDetail::whereIn('id', $ids)->get();
    }
}
