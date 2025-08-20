<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollSettlement extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_by',
        'reason',
        'closed_date',
        'rh_contract_id',
        'bank',
        'bank_account',
        'salary',
        'family_assignation',
        'total_days',
        'vacation_taken_days',
        'cts_days',
        'vacation_days',
        'gratification_days',
        'add_cts_amount',
        'add_vacation_amount',
        'add_gratification_amount',
        'init_date',
        'rh_pension_plan_id',
        'cts_init',
        'gratification_init',
        'add_total_description',
        'add_total_amount',
        'total',
        'sexto_grati',
        'period'
    ];

    public function rhContract()
    {
        return $this->belongsTo(RhContract::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function rhPensionPlan()
    {
        return $this->belongsTo(RhPensionPlan::class);
    }
}
