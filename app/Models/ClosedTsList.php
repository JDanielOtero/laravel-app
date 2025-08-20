<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosedTsList extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'ts_list_id',
        'user_id',
        'closed_date',
        'total_workers',
        'total_pps',
        'total_hh',
        'avg_hh',
        'period',
        'closed_payroll_id'
    ];
    public function tsList()
    {
        return $this->belongsTo(TsList::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function closedTsMembers()
    {
        return $this->hasMany(ClosedTsMember::class);
    }
    public function closedPayroll()
    {
        return $this->belongsTo(ClosedPayroll::class);
    }
}
