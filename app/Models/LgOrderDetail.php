<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgOrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['lg_order_id','lg_product_id', 'quantity', 'price','status'];

    public function lgOrder()
    {
        return $this->belongsTo(LgOrder::class);
    }

    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
}
