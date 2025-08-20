<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'lg_product_id',
        'stock',
        'lg_place_id',
        'valorization'
    ];

    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function lgPlace()
    {
        return $this->belongsTo(LgPlace::class);
    }
}
