<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmsRequirementWorker extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', 'pms_requirement_id', 'rh_worker_id',

    ];

    public function pmsRequirement()
    {
        return $this->belongsTo(PmsRequirement::class);
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function pmsWorkerReports()
    {
        return $this->hasMany(PmsWorkerReport::class);
    }
}
