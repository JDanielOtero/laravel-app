<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmsFacility extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'code', 'name','lg_costcenter_id'];

    public function lgCostcenter(){
        return $this->belongsTo(LgCostcenter::class);
    }
}
