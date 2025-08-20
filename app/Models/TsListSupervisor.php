<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TsListSupervisor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ts_list_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tsList()
    {
        return $this->belongsTo(TsList::class, 'ts_list_id');
    }
}
