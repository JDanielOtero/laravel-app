<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'document_number',
        'password',
        'status',
        'rh_worker_id',
        'email',
        'refresh_token'
    ];
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
}
