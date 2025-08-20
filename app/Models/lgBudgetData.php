<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lgBudgetData extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'lg_budget_id',
        'lg_product_id',
        'quantity',
        'required',
    ];

    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function lgBudget()
    {
        return $this->belongsTo(LgBudget::class);
    }
}
