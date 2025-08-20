<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\Worker;

class WorkerMetric extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'period',
        'rh_worker_id',
        'job_profile_id',
        'pp_metric_id',
        'metric',
        'file',
        'score',
        'goal',
        'kr_id',
        'frecuency',
        'worker_goal_id'
    ];

    protected $appends = ['completion_percent'];

    public function getCompletionPercentAttribute()
    {
        if ($this->goal && $this->goal > 0) {
            return round(($this->score / $this->goal) * 100, 2);
        }
        return 0;
    }

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
    public function ppMetric()
    {
        return $this->belongsTo(PpMetric::class);
    }
    public function workerGoal()
    {
        return $this->belongsTo(WorkerGoal::class);
    }
    public function kr()
    {
        return $this->belongsTo(Kr::class);
    }
}
