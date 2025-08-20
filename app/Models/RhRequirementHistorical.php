<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhRequirementHistorical extends Model
{
    use HasFactory;
    protected $fillable = ['rh_requirement_id', 'user_id', 'date', 'prev_status', 'status', 'note', 'minutes_diff', 'file'];

    public function rhRequirement()
    {
        return $this->belongsTo(RhRequirement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
