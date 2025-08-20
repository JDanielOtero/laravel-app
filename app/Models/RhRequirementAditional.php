<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhRequirementAditional extends Model
{
    use HasFactory;
    protected $fillable = [
        'rh_requirement_detail_id',
        'type',
        'name',
        'percent',
        'desirable',
        'note'
    ];

    public function rhRequirementDetail()
    {
        return $this->belongsTo(RhRequirementDetail::class);
    }

    public function rhCandidateFiles()
    {
        return $this->hasMany(RhCandidateFile::class);
    }
}
