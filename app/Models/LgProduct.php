<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'code',
        'code_type',
        'name',
        'brand',
        'info',
        'attribute_list',
        'image',
        'stock_min',
        'stock_type',
        'lg_product_type_id',
        'model',
        'color',
        'ul_certification',
        'size',
        'measure',
        'file',
        'lg_product_id',
        'created_by',
        'approved_by',
        'updated_by',
        'pr_subcategory_id',
        'approved_date',
        'discipline_type',
        'specialty_type',
        'material',
        'category_id',
        'tax_element_id',
        'tax_subaccount_id',
        'initial_price',
        'class',
        'clasification',
        'serie',
        'mp_id',
        'version',
        'lg_costcenter_id'
    ];

    public function prSubcategory()
    {
        return $this->belongsTo(PrSubcategory::class);
    }

    public function lgStockUnits()
    {
        return $this->belongsToMany(LgStockUnit::class);
    }
    public function lgProductType()
    {
        return $this->belongsTo(LgProductType::class);
    }
    public function parent()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function childs()
    {
        return $this->hasMany(LgProduct::class);
    }
    public function lgBudgetDetails()
    {
        return $this->hasMany(LgBudgetDetail::class);
    }

    public function lgRequirementDetail()
    {
        return $this->hasMany(LgRequirementDetail::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function lgStock($id = 0)
    {
        if ($id === 0) {
            return $this->hasOne(LgStock::class)->where('lg_place_id', $id);
        } else {
            return $this->hasMany(LgStock::class)->where('lg_place_id', $id)->first();
        }
    }
    public function trVehicle()
    {
        return $this->hasOne(TrVehicle::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function taxElement()
    {
        return $this->belongsTo(TaxElement::class);
    }

    public function taxSubaccount()
    {
        return $this->belongsTo(TaxSubaccounts::class);
    }

    public function lgPrerequirementDetail()
    {
        return $this->hasMany(LgPrerequirementDetail::class);
    }
    public function lgMP()
    {
        return $this->belongsTo(LgCostcenter::class, 'mp_id');
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
}
