<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaEvaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'group',
        'name',
        'key',
        'status',
        'percent',
        'grade',
        'value',
    ];
}
