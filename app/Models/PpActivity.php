<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'code',
        'activity',
        'job_profile_id',
        'created_by'
    ];

    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
