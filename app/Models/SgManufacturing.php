<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SgManufacturing extends Model
{
    use HasFactory;
    protected $fillable = [
        'lg_service_requirement_id',
        'client_rq_status',
        'design_rq_status',
        'quality_rq_status',
        'service_rq_status',
        'logistic_rq_status',
        'client_rq_user_id',
        'design_rq_user_id',
        'quality_rq_user_id',
        'service_rq_user_id',
        'logistic_rq_user_id',
        'client_rq_date',
        'design_rq_date',
        'quality_rq_date',
        'service_rq_date',
        'logistic_rq_date'
    ];

    public function lgServiceRequirement()
    {
        return $this->belongsTo(LgServiceRequirement::class);
    }
    public function clientUser()
    {
        return $this->belongsTo(User::class, 'client_rq_user_id');
    }
    public function designUser()
    {
        return $this->belongsTo(User::class, 'design_rq_user_id');
    }
    public function qualityUser()
    {
        return $this->belongsTo(User::class, 'quality_rq_user_id');
    }
    public function serviceUser()
    {
        return $this->belongsTo(User::class, 'service_rq_user_id');
    }
    public function logisticUser()
    {
        return $this->belongsTo(User::class, 'logistic_rq_user_id');
    }
}
