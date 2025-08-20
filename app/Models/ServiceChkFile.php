<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceChkFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_chk_id',
        'file',
        'note',
        'created_by'
    ];

    public function serviceChk()
    {
        return $this->belongsTo(ServiceChk::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
