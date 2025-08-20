<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GPhase extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'code', 'name', 'g_milestone_id', 'g_goal_id'];

    public function gMilestone()
    {
        return $this->belongsTo(GMilestone::class);
    }
    public function gGoal()
    {
        return $this->belongsTo(GGoal::class);
    }
    public function gCertificates()
    {
        return $this->hasMany(GCertificate::class);
    }
    public function lgSubresrouces()
    {
        return $this->hasMany(LgSubresource::class);
    }

    public function total()
    {
        return $this->gCertificates->sum(function ($certificate) {
            return $certificate->total();
        }) +  $this->lgSubresrouces()->sum(DB::raw('price * quantity'));
    }
}
