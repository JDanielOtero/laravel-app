<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationCriteriaOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'evaluation_criteria_template_id',
        'name',
        'rank',
        'value',
        'editable'
    ];
    public function evaluationCriteriaTemplate()
    {
        return $this->belongsTo(EvaluationCriteriaTemplate::class);
    }
}
