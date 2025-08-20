<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhContractHistorical extends Model
{

    use HasFactory;
    protected $fillable = [
        'created_by',
        'type',
        'rh_contract_id',
        'init_date',
        'end_date',
        'job_profile_id',
        'lg_costcenter_id',
        'family_assignation',
        'adenda_file',
        'signed_pp_file',
        'new_salary',
    ];
    public function rhContract()
    {
        return $this->belongsTo(RhContract::class, 'rh_contract_id');
    }
    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class, 'job_profile_id');
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class, 'lg_costcenter_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
