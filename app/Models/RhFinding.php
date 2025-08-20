<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhFinding extends Model
{
    use HasFactory;
    protected $fillable = [
        'date', 'user_id', 'assigned_id', 'status', 'description', 'assigned', 'finding_relation_type', 'finding_relation_id', 'user_name', 'user_email',
        'user_relation', 'user_phone', 'theme', 'district_id', 'type', 'social_safegrowth', 'ambiental_context', 'governance_economic', 'fast_action', 'file_url', 'mp_assigned',
        'anonymous', 'affected_system', 'impact', 'frecuency', 'score', 'result', 'strategy', 'smc_scale', 'analyze', 'disciplinary', 'apply', 'internal_external', 'specific_location'
        ,'lg_supplier_id','cost','risk'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function rhFindingWorkers()
    {
        return $this->hasMany(RhFindingWorker::class);
    }
}
