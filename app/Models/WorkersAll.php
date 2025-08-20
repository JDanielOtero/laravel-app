<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkersAll extends Model
{

    use HasFactory;
    protected $table = 'rh_workers';
    protected $fillable = [
        'document_type', 'document_number', 'first_name', 'middle_name', 'last_name', 'gender', 'civil_status', 'phone_number',
        'email', 'rh_regime_id', 'lg_costcenter_id', 'job_profile_id', 'file_url', 'gth_phase', 'status', 'document_url', 'born_date', 'profile_url', 'cel_number',
        'cel_number2', 'personal_email', 'district_id', 'address_type', 'address', 'address_reference', 'insurance', 'pension_regime', 'cuspp', 'sp_date', 'insurance_date', 'lifelaw_date',
        'rest_days', 'init_date', 'fotocheck', 'status_changed', 'mp_id','fidelity_file'
    ];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }
    public function rhSos()
    {
        return $this->hasMany(RhSo::class, 'table_id','id')->where('table_type','App\Models\RhWorker')->where('status', 'A');
    }
    public function rhBanks()
    {
        return $this->morphMany(RhBank::class, 'table');
    }

    public function rhContracts()
    {
        return $this->morphMany(RhContract::class, 'table')->where('status', 'A');
    }

    public function LgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
}
