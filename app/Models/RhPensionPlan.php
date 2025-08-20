<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhPensionPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'pension_mandatory',
        'pension_comission',
        'pension_seg'
    ];
}
