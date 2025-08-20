<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgWarehouse extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'name', 'info','balance'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function lgStocks(){
        return $this->hasMany(LgStock::class)->orderBy('id', 'desc');
    }
    public function lgStockBarcodes(){
        return $this->hasMany(LgStockBarcodes::class)->orderBy('id', 'desc');
    }
    
    public function lgHistorical(){
        return $this->hasMany(LgHistorical::class)->orderBy('id', 'desc');
    }
    public function lgHistoricalNoOrder(){
        return $this->hasMany(LgHistorical::class);
    }
    public function lgOrders()
    {
        return $this->hasMany(LgOrder::class)->orderBy('id', 'desc');
    }
}
