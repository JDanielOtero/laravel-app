<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhCandidateFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'rh_candidate_id',
        'rh_requirement_detail_id',
        'rh_requirement_aditional_id',
        'rh_experience_id',
    ];

    public function rhCandidate()
    {
        return $this->belongsTo(RhCandidate::class);
    }
    public function rhRequirementDetail()
    {
        return $this->belongsTo(RhRequirementDetail::class);
    }
    public function rhExperience()
    {
        return $this->belongsTo(RhExperience::class);
    }
    public function rhRequirementAditional()
    {
        return $this->belongsTo(RhRequirementAditional::class);
    }
}
