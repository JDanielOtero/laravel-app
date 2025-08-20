<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Request;

class RhWorker extends Model
{
    use HasFactory;
    protected $fillable = [
        'document_type',
        'document_number',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'civil_status',
        'phone_number',
        'email',
        'rh_regime_id',
        'lg_costcenter_id',
        'job_profile_id',
        'file_url',
        'gth_phase',
        'status',
        'document_url',
        'born_date',
        'profile_url',
        'cel_number',
        'cel_number2',
        'personal_email',
        'district_id',
        'address_type',
        'address',
        'address_reference',
        'insurance',
        'pension_regime',
        'cuspp',
        'sp_date',
        'insurance_date',
        'lifelaw_date',
        'rest_days',
        'init_date',
        'fotocheck',
        'status_changed',
        'mp_id',
        'tmp_status',
        'signed_pp',
        'add_district_id',
        'created_by',
        'updated_by',
        'fidelity_file',
        'specialty_type',
        'settlement_payment_id',
        'old_job_profile_id',
        'hide_information',
        'licence',
        'apt',
        'rh_pension_plan_id',
        'full_name'
    ];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }



    public function RhRegime()
    {
        return $this->belongsTo(RhRegime::class);
    }

    public function LgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function lgMP()
    {
        return $this->belongsTo(LgCostcenter::class, 'mp_id');
    }
    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function districtAdd()
    {
        return $this->belongsTo(District::class, 'add_district_id');
    }
    public function lgPlaces()
    {
        return $this->morphMany(LgPlace::class, 'table')->where('status', 'A');
    }
    public function RhSocialnetworks()
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
    public function rhBeneficiaries()
    {
        return $this->morphMany(RhBeneficiary::class, 'table')->where('status', 'A');
    }
    public function rhBanks()
    {
        return $this->morphMany(RhBank::class, 'table')->where('status', 'A');;
    }
    public function rhContacts()
    {
        return $this->morphMany(RhContact::class, 'table')->where('status', 'A');
    }
    public function rhContracts()
    {
        return $this->morphMany(RhContract::class, 'table')->where('status', 'A');
    }

    public function lastContract()
    {
        $today = now();

        return $this->hasOne(RhContract::class, 'table_id')
            ->where('table_type', self::class)
            ->latest('id');
    }

    public function lastActiveContract()
    {
        $thresholdDate = now()->subDays(15); // Últimos 15 días

        return $this->hasOne(RhContract::class, 'table_id')
            ->where('table_type', self::class)
            ->where('status', 'A')
            ->where('init_date', '<=', now())
            ->where('end_date', '>=', $thresholdDate) // Activo o terminado en los últimos 15 días
            ->latest('id');
    }

    public function lastContractByPeriod($period)
    {
        $start = Carbon::parse($period . '-01')->startOfMonth();
        $end   = Carbon::parse($period . '-01')->endOfMonth();

        return $this->hasOne(RhContract::class, 'table_id')
            ->where('table_type', self::class)
            // activo en algún momento del mes indicado:
            ->where('init_date', '<=', $end)
            ->where(function ($q) use ($start) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>=', $start);
            })
            // prioridades
            ->orderByRaw("CASE WHEN status = 'A' THEN 0 ELSE 1 END")
            ->orderByRaw("COALESCE(amount, 0) DESC")
            ->orderByDesc('id');
    }



    public function rhContractsPending()
    {
        return $this->morphMany(RhContract::class, 'table')->where('status', 'E');
    }
    public function rhWorkerHistoricals()
    {
        return $this->hasMany(RhWorkerHistorical::class);
    }
    public function rhExperiences()
    {
        return $this->hasMany(RhExperience::class);
    }
    public function rhEducations()
    {
        return $this->hasMany(RhEducation::class);
    }

    public function processDetails()
    {
        return $this->hasMany(ProcessWorker::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function myEvaluations()
    {
        return $this->hasMany(MyEvaluation::class)->orderBy('id', 'desc');
    }
    public function workerMetrics()
    {
        return $this->hasMany(WorkerMetric::class)->orderBy('id', 'desc');
    }
    public function rhPensionPlan()
    {
        return $this->belongsTo(RhPensionPlan::class);
    }
}
