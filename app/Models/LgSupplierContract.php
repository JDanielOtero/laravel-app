<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgSupplierContract extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', 'lg_supplier_id', 'lg_costcenter_id', 'rh_worker_id', 'aproval_date', 'contract_type',
        'init_date', 'end_date', 'sign_date', 'file_url'
    ];

    public function lgSupplier()
    {
        return $this->belongsTo(LgSupplier::class);
    }

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
}
