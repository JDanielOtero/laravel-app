<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpMetric extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'metric',
        'job_profile_id',
        'frecuency',
        'type',
        'kr_id',
        'goal',
        'dato1_key',
        'dato2_key',
        'dato3_key',
        'formula',
        'result_type'
    ];

    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
    public function kr()
    {
        return $this->belongsTo(Kr::class);
    }
}
