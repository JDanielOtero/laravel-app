<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhTimesheet extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'date', 'user_id', 'rh_timesheet_list_id','file'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function RhTimesheetList()
    {
        return $this->belongsTo(RhTimesheetList::class);
    }
    public function RhTimesheetDetails()
    {
        return $this->hasMany(RhTimesheetDetail::class);
    }
}
