<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RhRequirementDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'rh_requirement_id',
        'job_profile_id',
        'slots',
        'type',
        'mision',
        'init_date',
        'init_type',
        'salary',
        'rh_regime_id',
        'time_required',
        'time_type',
        'minimal_formation',
        'motive',
        'image'
    ];

    public function rhRequirement()
    {
        return $this->belongsTo(RhRequirement::class);
    }
    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
    public function rhRegime()
    {
        return $this->belongsTo(RhRegime::class);
    }
    public function rhCandidates()
    {
        return $this->hasMany(RhCandidate::class);
    }
    public function rhRequirementAditionals()
    {
        return $this->hasMany(RhRequirementAditional::class);
    }

    public function rhCandidateFiles()
    {
        return $this->hasMany(RhCandidateFile::class);
    }
}
