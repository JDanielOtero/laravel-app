<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lgService extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'code',
        'name',
        'info',
        'category_id',
        'initial_price',
        'duration_days',
        'duration_hours',
        'conditions',
        'lg_supplier_id',
        'file_url',
        'search',
        'note',
        'mp_id',
        'class',
        'lg_costcenter_id',
        'pms_area_id',
        'pms_base_id',
        'client_type',
        'service_type',
        'source_type',
        'lg_place_id',
        'type',
        'created_by',
        'updated_by',
        'aproved_by',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function lgSupplier()
    {
        return $this->belongsTo(LgSupplier::class);
    }

    public function lgMp()
    {
        return $this->belongsTo(LgCostcenter::class, 'mp_id');
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function lgServiceActivities()
    {
        return $this->hasMany(LgServiceActivity::class);
    }
}
