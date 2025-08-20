<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RqfLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'rqf_id',
        'link_type',
        'link_id'
    ];

    public function rqf()
    {
        return $this->belongsTo(Rqf::class);
    }

    public function linkRqs()
    {
        return $this->belongsTo(LgServiceRequirement::class, 'link_id');
    }

    public function linkRqp()
    {
        return $this->belongsTo(RhRequirementDetail::class, 'link_id');
    }

    public function linkRqa()
    {
        return $this->belongsTo(LgRequirementDetail::class, 'link_id');
    }
}
