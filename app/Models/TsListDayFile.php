<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TsListDayFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'file',
        'user_id',
        'ts_list_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tsList()
    {
        return $this->belongsTo(TsList::class);
    }
}
