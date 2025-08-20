<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhContract extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'table_type',
        'table_id',
        'workday',
        'regimen',
        'type',
        'type_modal',
        'sign_date',
        'init_date',
        'end_date',
        'special_situation',
        'status_period',
        'fix_value',
        'contract_url',
        'adenda_url',
        'declaration_url',
        'act_url',
        'recorrido_url',
        'created_by',
        'updated_by',
        'signed_pp',
        'lg_costcenter_id',
        'job_profile_id',
        'amount',
        'family_assignation',
        'old_job_profile_id',
        'close_date',
        'change_date',
        'civil_category_id',
        'bae',
        'has_sindical',
        't_registro_file'
    ];


    public function table()
    {
        return $this->morphTo();
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class, 'table_id');
    }

    public function months()
    {
        try {
            $fecha1 = date_create($this->end_date);
            $fecha2 = date_create($this->init_date);
            $dias = date_diff($fecha2, $fecha1)->format('%R%a');
            return round($dias / 30, 2);
        } catch (Exception $e) {
            return 0;
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
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
    public function rhFixedValues()
    {
        return $this->hasMany(RhFixedValue::class, 'rh_contract_id');
    }
    public function rhContractHistoricals()
    {
        return $this->hasMany(RhContractHistorical::class, 'rh_contract_id');
    }
    public function civilCategory()
    {
        return $this->belongsTo(CivilCategory::class);
    }
    public function closedTsMembers()
    {
        return $this->hasMany(ClosedTsMember::class);
    }
}
