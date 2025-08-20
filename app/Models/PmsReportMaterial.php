<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmsReportMaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        'pms_worker_report_id',
        'lg_product_id',
        'quantity',
        'voltage',
        'hours',
        'type',
        'description',
        'measure'
    ];

    public function pmsWorkerReport()
    {
        return $this->belongsTo(PmsWorkerReport::class);
    }
    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
}
