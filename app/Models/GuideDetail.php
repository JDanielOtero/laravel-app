<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'lg_requirement_detail_id',
        'guide_id',
        'real_quantity',
        'note',
        'due_date',
        'file_url'
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
    public function lgRequirementDetail()
    {
        return $this->belongsTo(LgRequirementDetail::class);
    }
    public function guideHistoricals()
    {
        return $this->hasMany(GuideHistorical::class);
    }
}
