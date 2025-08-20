<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhGeneralApplicant extends Model
{
    use HasFactory;
    protected $fillable = [
        'rh_worker_id',
        'status',
        'last_application',
        'source'
    ];

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }

    public function rhCandidates()
    {
        return $this->hasMany(RhCandidate::class);
    }
}
