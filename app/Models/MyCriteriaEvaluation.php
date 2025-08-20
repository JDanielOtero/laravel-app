<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCriteriaEvaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'my_evaluation_id',
        'evaluation_criteria_template_id',
        'evaluation_criteria_option_id',
        'value',
        'gth_evaluation_criteria_option_id',
        'gth_value',
        'amount',
        'gth_amount',
        'file'
    ];

    public function myEvaluation()
    {
        return $this->belongsTo(MyEvaluation::class);
    }
    public function evaluationCriteriaTemplate()
    {
        return $this->belongsTo(EvaluationCriteriaTemplate::class);
    }
    public function evaluationCriteriaOption()
    {
        return $this->belongsTo(EvaluationCriteriaOption::class);
    }
    public function gthEvaluationCriteriaOption()
    {
        return $this->belongsTo(EvaluationCriteriaOption::class, 'gth_evaluation_criteria_option_id');
    }
}
