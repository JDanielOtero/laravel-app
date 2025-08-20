<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhProcessDetail extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'name', 'lg_costcenter_id', 'group'];
    
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
}
