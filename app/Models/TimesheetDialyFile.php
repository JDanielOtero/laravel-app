<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimesheetDialyFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lg_costcenter_id',
        'date',
        'file'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class, 'lg_costcenter_id');
    }
}
