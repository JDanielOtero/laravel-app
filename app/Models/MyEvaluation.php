<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'evaluation_template_id',
        'rh_worker_id',
        'user_revision_id',
        'user_accept_id',
        'current_salary',
        'min_salary',
        'max_salary',
        'total_score',
        'total_gth_score',
        'note',
        'date',
        'file_url',
        'period',
        'total',
        'increase_amount',
        'new_salary',
        'category_amount',
        'gth_total',
        'gth_increase_amount',
        'gth_new_salary',
        'gth_category_amount',
        'new_salary_deyfor',
        'gth_new_salary_deyfor',
        'job_profile_id',
        'selected_salary',
        'current_bono',
        'selected_bono',
        'type',
        'file2_url',
        'min_salary_view',
        'max_salary_view',
    ];

    public function evaluationTemplate()
    {
        return $this->belongsTo(EvaluationTemplate::class);
    }
    public function myCriteriaEvaluations()
    {
        return $this->hasMany(MyCriteriaEvaluation::class);
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
    public function userRevision()
    {
        return $this->belongsTo(User::class, 'user_revision_id');
    }
    public function userAccept()
    {
        return $this->belongsTo(User::class, 'user_accept_id');
    }
    public function jobProfile()
    {
        return $this->belongsTo(JobProfile::class);
    }
}
