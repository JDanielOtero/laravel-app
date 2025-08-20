<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrChapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'cr_course_id',
        'status',
        'name',
        'order',
        'code'
    ];
    public function crCourse()
    {
        return $this->belongsTo(CrCourse::class);
    }

    public function crClasses()
    {
        return $this->hasMany(CrClass::class);
    }
    public function crEvaluation()
    {
        return $this->hasOne(CrEvaluation::class);
    }
}
