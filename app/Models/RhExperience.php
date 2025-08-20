<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'company',
        'rh_worker_id',
        'ruc',
        'rubro',
        'job',
        'area',
        'level',
        'init_date',
        'final_date',
        'file',
        'note'
    ];

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
}
