<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerProfileFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'rh_worker_id',
        'job_profile_id',
        'gd_pp_file',
        'gi_pp_file',
        'created_by'
    ];
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
