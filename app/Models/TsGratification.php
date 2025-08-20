<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TsGratification extends Model
{
    use HasFactory;
    protected $fillable = [
        'rh_worker_id',
        'user_id',
        'rh_contract_id',
        'period',
        'avarage',
        'salary',
        'total',
        'essalud',
        'status',
        'type'
    ];
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rhContract()
    {
        return $this->belongsTo(RhContract::class);
    }
}
