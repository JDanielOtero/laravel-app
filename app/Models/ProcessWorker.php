<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessWorker extends Model
{
    use HasFactory;
    protected $fillable = ['rh_process_detail_id', 'rh_worker_id', 'status', 'complete_date', 'user_id','request_date','historical','historical_user_id'];

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function rhProcessDetail()
    {
        return $this->belongsTo(RhProcessDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function historicalUser()
    {
        return $this->belongsTo(User::class,'historical_user_id');
    }
}
