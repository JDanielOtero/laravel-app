<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhRequirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id',
        'user_revision_id',
        'user_accept_id',
        'tentative_date',
        'lg_costcenter_id',
        'note',
        'revision_date',
        'closed_date',
        'lg_budget_id',
        'g_order_id',
        'file',
        'code',
        'prev_status',
        'status_changed',
        'user_complete_id',
        'type',
        'lg_place_id',
        'mp_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function userRevision()
    {
        return $this->belongsTo(User::class, 'user_revision_id');
    }
    public function userAccept()
    {
        return $this->belongsTo(User::class, 'user_accept_id');
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function gOrder()
    {
        return $this->belongsTo(GOrder::class);
    }
    public function lgBudget()
    {
        return $this->belongsTo(LgBudget::class);
    }
    public function rhRequirementDetails()
    {
        return $this->hasMany(RhRequirementDetail::class);
    }
    public function lgPlace()
    {
        return $this->belongsTo(lgPlace::class);
    }
    public function lgMP()
    {
        return $this->belongsTo(LgCostcenter::class,'mp_id');
    }
}
