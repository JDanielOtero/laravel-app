<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgServiceRequirementHistorical extends Model
{
    use HasFactory;
    protected $fillable = [
        'lg_service_requirement_id',
        'user_id',
        'date',
        'prev_status',
        'status',
        'note',
        'minutes_diff',
        'file',
        'reject_reason'
    ];

    public function lgServiceRequirement()
    {
        return $this->belongsTo(LgServiceRequirement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
