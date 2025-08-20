<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemisionGuideProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'remision_guide_id',
        'quantity',
        'lg_product_id',
        'name',
        'measure'
    ];

    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }
    public function remisionGuide()
    {
        return $this->belongsTo(RemisionGuide::class);
    }
}
