<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgStockBarcode extends Model
{
    use HasFactory;
    protected $fillable = ['lg_warehouse_id', 'lg_product_id', 'barcode','cost','status','lg_order_id'];

    public function lgWarehouse()
    {
        return $this->belongsTo(LgWarehouse::class);
    }
    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function lgOrder()
    {
        return $this->belongsTo(LgOrder::class);
    }
}
