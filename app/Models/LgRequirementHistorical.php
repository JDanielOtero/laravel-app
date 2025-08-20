<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgRequirementHistorical extends Model
{
    use HasFactory;
    protected $fillable = [
        'lg_requirement_detail_id',
        'user_id',
        'date',
        'prev_status',
        'status',
        'note',
        'minutes_diff',
        'reject_reason'
    ];

    public function lgRequirementDetail()
    {
        return $this->belongsTo(LgRequirementDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
