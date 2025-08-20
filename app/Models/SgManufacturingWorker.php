<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SgManufacturingWorker extends Model
{
    use HasFactory;
    protected $fillable = [
        'lg_service_requirement_id',
        'rh_worker_id',
        'type'
    ];
    public function lgserviceRequirement()
    {
        return $this->belongsTo(LgServiceRequirement::class);
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
}
