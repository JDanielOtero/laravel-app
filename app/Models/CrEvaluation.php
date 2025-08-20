<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrEvaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_by',
        'cr_course_id',
        'cr_chapter_id',
        'cr_class_id',
        'name',
        'description'
    ];
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function crCourse()
    {
        return $this->belongsTo(CrCourse::class);
    }
    public function crChapter()
    {
        return $this->belongsTo(CrChapter::class);
    }
    public function crClass()
    {
        return $this->belongsTo(crClass::class);
    }
    public function crCriteriaEvaluations()
    {
        return $this->hasMany(CrCriteriaEvaluation::class);
    }
}
