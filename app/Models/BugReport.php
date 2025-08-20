<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'description',
        'file',
        'external_link',
        'internal_link',
        'priority',
        'solution_file',
        'user_id',
        'user_accept_id',
        'type'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
