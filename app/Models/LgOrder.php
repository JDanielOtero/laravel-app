<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgOrder extends Model
{
    use HasFactory;
    protected $fillable = ['status','date', 'type', 'from','lg_warehouse_id','user_id','user_revision_id','info','warehouse_from'];

    public function lgWarehouse()
    {   
        return $this->belongsTo(LgWarehouse::class);
    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_revision()
    {
        return $this->belongsTo(User::class,'user_revision_id');
    }

    public function details()
    {
        return $this->hasMany(LgOrderDetail::class)->orderBy('id', 'desc');
    }

    
    public function barcodes()
    {
        return $this->hasMany(LgStockBarcodes::class)->orderBy('id', 'desc');
    }
}
