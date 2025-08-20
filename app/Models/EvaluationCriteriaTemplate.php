<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationCriteriaTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'evaluation_template_id',
        'name',
        'value',
        'note',
        'type',
        'require_file'
    ];
    public function evaluationTemplate()
    {
        return $this->belongsTo(EvaluationTemplate::class);
    }
    public function evaluationCriteriaOptions()
    {
        return $this->hasMany(EvaluationCriteriaOption::class);
    }
}
