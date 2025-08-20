<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lgKardexWorkerDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'lg_kardex_worker_id',
        'lg_product_id',
        'rh_worker_id'
    ];

    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }

    public function lgKardexWorker()
    {
        return $this->belongsTo(LgKardexWorker::class);
    }

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
}
