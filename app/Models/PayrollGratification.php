<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollGratification extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'rh_worker_id',
        'amount',
        'period'
    ];

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
}
