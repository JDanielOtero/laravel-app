<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TsOutday extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'from_date',
        'to_date',
        'rh_timesheet_type_id',
        'note',
        'file',
        'created_by'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function RhTimesheetType()
    {
        return $this->belongsTo(RhTimesheetType::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function rhTimesheetDetails()
    {
        return $this->hasMany(RhTimesheetDetail::class);
    }
}
