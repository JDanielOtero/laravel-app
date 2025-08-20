<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'name', 'code', 'class_code', 'class_type', 'lg_costcenter_id', 'family_type', 'tax_element_id', 'tax_subaccount_id', 'line_code', 'line_name', 'pr_subcategory_id', 'pr_clasification_id'];

    public function lgProducts()
    {
        return $this->hasMany(LgProduct::class)->where('status', 'A')->orderBy('id', 'desc');
    }

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }

    public function taxElement()
    {
        return $this->belongsTo(TaxElement::class);
    }

    public function taxSubaccount()
    {
        return $this->belongsTo(TaxSubaccounts::class);
    }
    public function prSubcategory()
    {
        return $this->belongsTo(PrSubcategory::class);
    }
    public function prClasification()
    {
        return $this->belongsTo(PrClasification::class);
    }
}
