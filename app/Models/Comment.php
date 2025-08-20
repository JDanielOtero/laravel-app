<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'rh_worker_id', 'comment', 'comment_type','file_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
}
