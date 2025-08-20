<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosedTsMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'rh_contract_id',
        'closed_ts_list_id',
        'user_id',
        'worked_days',
        'rest_days',
        'vacation_days',
        'holi_days',
        'disability_days',
        'medical_days',
        'paternity_days',
        'maternity_days',
        'compensated_days',
        'other_licence_days',
        'worked_holidays',
        'absence_days',
        'all_worked_days',
        'missing_days',
        'additional_days',
        'prev_rest_days',
        'current_salary',
        'family_assignation',
        'rh_pension_plan_id',
        'regimen_type',
        'cate5_amount'
    ];



    public function closedTsList()
    {
        return $this->belongsTo(ClosedTsList::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function closedTsAmount()
    {
        return $this->hasOne(ClosedTsAmount::class);
    }
    public function rhContract()
    {
        return $this->belongsTo(RhContract::class);
    }
    public function rhPensionPlan()
    {
        return $this->belongsTo(RhPensionPlan::class);
    }
}
