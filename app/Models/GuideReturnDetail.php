<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideReturnDetail extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'guide_historical_id', 'guide_id','real_quantity','note','due_date'];
    
    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
    public function guideHistorical()
    {
        return $this->belongsTo(GuideHistorical::class);
    }
}
