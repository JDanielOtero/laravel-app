<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rhTimesheetListFollowup extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','rh_timesheetlist_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function RhTimesheetList(){
        return $this->belongsTo(RhTimesheetList::class);
    }
}
