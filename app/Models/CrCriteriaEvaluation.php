<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrCriteriaEvaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'cr_evaluation_id',
        'name',
        'type',
        'options'
    ];

    public function crEvaluation()
    {
        return $this->belongsTo(CrEvaluation::class);
    }
}
