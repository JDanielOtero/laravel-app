<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'validate', 'validate_by', 'file_type', 'lg_product_id', 'lg_supplier_id', 'lg_costcenter_id',
        'lg_requirement_detail_id', 'status', 'note', 'reference_id', 'cost', 'emision_date', 'end_date',
        'lg_service_id','lg_prerequirement_detail_id'
    ];

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function lgSupplier()
    {
        return $this->belongsTo(LgSupplier::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function lgRequirementDetail()
    {
        return $this->belongsTo(lgRequirementDetail::class);
    }
    public function lgPreRequirementDetail()
    {
        return $this->belongsTo(lgPreRequirementDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'validate_by');
    }
    public function lgService()
    {
        return $this->belongsTo(lgService::class);
    }
}
