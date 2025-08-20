<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kr extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'description',
        'color',
        'type',
        'kr_id',
        'main_kr',
        'goal_type',
        'lg_costcenter_id'
    ];

    public function getAllKrDescendantIds()
    {
        $descendants = [];

        foreach ($this->krs as $child) {
            $descendants[] = $child->id;
            $descendants = array_merge($descendants, $child->getAllKrDescendantIds());
        }

        return $descendants;
    }

    public function calculateGoalCompleteAvg($period)
    {
        $allKrIds = $this->getAllKrDescendantIds();
        $allKrIds[] = $this->id;

        $metrics = WorkerMetric::whereIn('kr_id', $allKrIds)
            ->where('period', $period)
            ->get();

        if ($metrics->count() > 0) {
            return round($metrics->avg(fn($m) => $m->completion_percent), 2);
        }

        return 0;
    }


    public function kr()
    {
        return $this->belongsTo(Kr::class);
    }

    public function krs()
    {
        return $this->hasMany(Kr::class);
    }

    public function lgCostcenter()
    {
        return $this->hasMany(LgCostcenter::class);
    }
    public function workerMetrics()
    {
        return $this->hasMany(WorkerMetric::class);
    }
}
