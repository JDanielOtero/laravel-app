<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'end_date',
        'user_id',
        'user_revision_id',
        'user_accept_id',
        'name',
        'description',
        'file',
        'status',
        'lg_costcenter_id',
        'user_complete_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userRevision()
    {
        return $this->belongsTo(User::class, 'user_revision_id');
    }
    public function userAccept()
    {
        return $this->belongsTo(User::class, 'user_accept_id');
    }
    public function crChapters()
    {
        return $this->hasMany(CrChapter::class);
    }
    public function lgCostcenter()
    {
        return $this->belongsTo(LgCostcenter::class);
    }
    public function crCourseUsers()
    {
        return $this->hasMany(CrCourseUser::class);
    }
}
