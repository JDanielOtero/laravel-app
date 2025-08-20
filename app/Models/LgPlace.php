<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgPlace extends Model
{

    use HasFactory;
    protected $fillable = [
        'status',
        'name',
        'table_type',
        'table_id',
        'code',
        'region_type',
        'district_id',
        'address',
        'activities',
        'reference',
        'file_url',
        'created_by',
        'updated_by',
        'lg_costcenter_id',
        'pms_area_id',
        'ubigeo'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function table()
    {
        return $this->morphTo();
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function pmsArea()
    {
        return $this->belongsTo(PmsArea::class);
    }
}
