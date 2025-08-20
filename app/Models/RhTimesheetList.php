<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhTimesheetList extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lg_costcenter_id'];

    public function LgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function RhTimesheetSupervisors()
    {
        return $this->hasMany(RhTimesheetSupervisor::class);
    }
    public function RhTimesheetListFollowup()
    {
        return $this->hasMany(RhTimesheetListFollowup::class);
    }

    public function RhTimesheets()
    {
        return $this->hasMany(RhTimesheet::class);
    }
}
