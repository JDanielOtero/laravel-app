<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhCandidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'rh_worker_id',
        'rh_requirement_detail_id',
        'points',
        'created_by',
        'recomended_by',
        'salary_claim',
        'rh_general_applicant_id'
    ];

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function rhRequirementDetail()
    {
        return $this->belongsTo(RhRequirementDetail::class);
    }

    public function rhCandidateFiles()
    {
        return $this->hasMany(RhCandidateFile::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function recomendedBy()
    {
        return $this->belongsTo(TmpUser::class, 'recomended_by');
    }
    public function rhGeneralApplicant()
    {
        return $this->belongsTo(RhGeneralApplicant::class);
    }
}
