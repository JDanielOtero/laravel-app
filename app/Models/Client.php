<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'code',
        'stage',
        'document_type',
        'document_number',
        'name',
        'alias',
        'client_type',
        'sunat_date_init',
        'activities_date_init',
        'category_id',
        'region_type',
        'district_id',
        'address',
        'line',
        'deduction_acount',
        'latitud',
        'longitud',
        'main_lg_costcenter_id',
        'interest_group'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function LgCostcenters()
    {
        return $this->hasMany(LgCostcenter::class);
    }
    public function rhContacts()
    {
        return $this->morphMany(RhContact::class, 'table');
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class, 'main_lg_costcenter_id');
    }
}
