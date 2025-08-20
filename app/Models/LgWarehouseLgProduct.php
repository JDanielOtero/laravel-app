<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgWarehouseLgProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['lg_product_id', 'lg_warehouse_id', 'cost', 'price','discount'];

    public function lgWarehouse()
    {
        return $this->belongsToMany(LgWarehouse::class);
    }
    public function lgProduct()
    {
        return $this->belongsToMany(LgProduct::class);
    }
}
