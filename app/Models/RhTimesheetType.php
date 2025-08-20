<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhTimesheetType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'value',
        'back_color',
        'font_color',
        'type',
        'rest_calculation',
    ];

    public function RhTimesheetDetails()
    {
        return $this->hasMany(RhTimesheetDetail::class);
    }
}
