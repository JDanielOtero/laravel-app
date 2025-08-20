<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lgKardex extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'file_url', 'rh_worker_id', 'lg_product_id', 'lg_requirement_id'];

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }

    public function lgProduct()
    {
        return $this->belongsTo(lgProduct::class);
    }

    public function lgRequirement()
    {
        return $this->belongsTo(LgRequirement::class);
    }
}
