<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GOrder extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'code', 'name', 'lg_costcenter_id','note','file_url','amount','currency','init_date','end_date'];

    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
}
