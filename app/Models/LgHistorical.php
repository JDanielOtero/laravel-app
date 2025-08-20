<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgHistorical extends Model
{
    use HasFactory;
    protected $fillable = ['type','user_id','lg_warehouse_id','lg_product_id', 'quantity','observation'];

    public function lgWarehouse()
    {
        return $this->belongsTo(LgWarehouse::class);
    }
    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
