<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerGoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'period',
        'rh_worker_id',
        'score_avg'
    ];

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function workerMetrics()
    {
        return $this->hasMany(WorkerMetric::class);
    }
}
