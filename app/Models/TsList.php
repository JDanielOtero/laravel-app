<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TsList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lg_costcenter_id',
        'client_id',
        'discipline',
        'lg_place_id',
        'guardia',
        'apc_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function apc()
    {
        return $this->belongsTo(User::class, 'apc_id');
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function tsListMembers()
    {
        return $this->hasMany(TsListMember::class);
    }
    public function closedTsLists()
    {
        return $this->hasMany(ClosedTsList::class);
    }
    public function lgPlace()
    {
        return $this->belongsTo(LgPlace::class);
    }
    public function tsListSupervisors()
    {
        return $this->hasMany(TsListSupervisor::class);
    }
}
