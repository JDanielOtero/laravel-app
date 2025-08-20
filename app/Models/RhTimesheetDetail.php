<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhTimesheetDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'value',
        'hours_work',
        'hours_off',
        'user_id',
        'rh_timesheet_id',
        'date',
        'rh_timesheet_type_id',
        'note',
        'file_url',
        'day',
        'fract_id',
        'rh_regime_id',
        'lg_costcenter_id',
        'total_hours',
        'extra_hours',
        'rest_days_used',
        'created_by',
        'worker_status',
        'closed_ts_member_id',
        'period',
        'ts_outday_id',
        'ts_list_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function RhTimesheet()
    {
        return $this->belongsTo(RhTimesheet::class);
    }
    public function RhTimesheetType()
    {
        return $this->belongsTo(RhTimesheetType::class);
    }
    public function rhRegime()
    {
        return $this->belongsTo(RhRegime::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }

    public function details()
    {
        return $this->hasMany(RhTimesheetDetail::class, 'fract_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function closedTsMember()
    {
        return $this->belongsTo(ClosedTsMember::class, 'created_by');
    }
    public function tsOutday()
    {
        return $this->belongsTo(TsOutday::class);
    }
    public function tsList()
    {
        return $this->belongsTo(TsList::class);
    }
}
