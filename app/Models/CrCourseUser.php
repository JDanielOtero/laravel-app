<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrCourseUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'cr_course_id',
        'user_id',
        'percent',
        'grade'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function crCourse()
    {
        return $this->belongsTo(CrCourse::class);
    }
}
