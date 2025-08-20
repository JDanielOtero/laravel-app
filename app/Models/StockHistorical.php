<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockHistorical extends Model
{
    use HasFactory;
    protected $fillable = [
        'lg_requirement_detail_id',
        'lg_product_id',
        'quantity',
        'user_id',
        'type',
        'note',
        'rh_worker_id',
        'file_url',
        'type_inout',
        'lg_place_id',
        'motive',
        'stock_movement_id'
    ];

    public function lgRequirementDetail()
    {
        return $this->belongsTo(LgRequirementDetail::class);
    }

    public function lgProduct()
    {
        return $this->belongsTo(LgProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function stockMovemenet()
    {
        return $this->belongsTo(StockMovement::class);
    }
    public function lgPlace()
    {
        return $this->belongsTo(LgPlace::class);
    }
}
