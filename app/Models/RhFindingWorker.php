<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhFindingWorker extends Model
{
    protected $fillable = [
        'rh_worker_id',
        'assigned',
        'rh_finding_id'
    ];
    use HasFactory;

    public function rhFinding(){
        return $this->belongsTo(RhFinding::class);
    }
    public function rhWorker(){
        return $this->belongsTo(WorkersAll::class,'rh_worker_id');
    }
}
