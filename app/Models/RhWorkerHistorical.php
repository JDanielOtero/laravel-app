<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhWorkerHistorical extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'rh_worker_id',
        'lg_costcenter_id',
        'job_profile_id',
        'rh_regime_id',
        'date',
        'user_id',
        'file',
        'gth_phase',
        'note',
        'work_historical',
        'old_job_profile_id'
    ];

    public function rhRegime()
    {
        return $this->belongsTo(RhRegime::class);
    }

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
    public function rhWorker()
    {
        return $this->belongsTo(rhWorker::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
