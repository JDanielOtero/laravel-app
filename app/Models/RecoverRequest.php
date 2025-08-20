<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecoverRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'dni',
        'email',
        'tmp_user_id',
        'note',
        'status'
    ];

    public function tmpUser()
    {
        return $this->belongsTo(TmpUser::class, 'tmp_user_id');
    }
}
