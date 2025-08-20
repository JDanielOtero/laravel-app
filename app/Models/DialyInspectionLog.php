<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialyInspectionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'date',
        'lg_costcenter_id',
        'turn_type',
        'init_hours',
        'area',
        'discipline',
        'contractor',
        'dialy_track_id',
        'dialy_track_activity_id',
        'potential',
        'note',
        'finding_type',
        'report_type',
        'observation',
        'file_1',
        'file_2',
        'file_3',
        'add_workers',
        'user_complete_id',
        'reason',
        'action',
        'action_report_type',
        'action_end_date',
        'action_file_validation',
        'action_file_evidence'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dialyTrack()
    {
        return $this->belongsTo(DialyTrack::class);
    }
    public function dialyTrackActivity()
    {
        return $this->belongsTo(DialyTrackActivity::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function userComplete()
    {
        return $this->belongsTo(User::class, 'user_complete_id');
    }
}
