<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgPurchaseFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'supplier_ruc',
        'supplier_name',
        'location',
        'payment_metoth',
        'hours_delivery',
        'hours_transport',
        'hours_credit',
        'file',
        'price',
        'lg_requirement_detail_id',
        'cot_number',
        'puntaje',
        'lg_prerequirement_detail_id'
    ];

    public function lgRequirementDetail()
    {
        return $this->belongsTo(LgRequirementDetail::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function lgPrerequirementDetail()
    {
        return $this->belongsTo(LgPrerequirementDetail::class);
    }

}
