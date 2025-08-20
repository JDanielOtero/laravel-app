<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgServiceRequirementWorker extends Model
{
    use HasFactory;
    protected $fillable = ['lg_service_requirement_id', 'rh_worker_id'];

    public function lgServiceRequirement()
    {
        return $this->belongsTo(LgServiceRequirement::class);
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
}
