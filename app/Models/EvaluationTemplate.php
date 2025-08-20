<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'status',
        'max_score',
        'type'
    ];
    public function evaluationCriteriaTemplates()
    {
        return $this->hasMany(EvaluationCriteriaTemplate::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function myEvaluations()
    {
        return $this->hasMany(MyEvaluation::class);
    }
}
