<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmsWorkerReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'pms_requirement_worker_id',
        'status',
        'percentage',
        'note',
        'init_date',
        'end_date',
        'file_url',
        'image_url',
        'pms_activity_id',
        'user_id'
    ];

    public function pmsRequirementWorker()
    {
        return $this->belongsTo(PmsRequirementWorker::class);
    }
    public function activity()
    {
        return $this->belongsTo(LgServiceActivity::class, 'pms_activity_id');
    }
}
