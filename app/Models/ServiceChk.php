<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceChk extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'chk',
        'percent',
        'lg_service_requirement_id',
        'created_by',
        'updated_by',
        'type',
        'group',
        'link'
    ];

    public function lgServiceRequirement()
    {
        return $this->belongsTo(LgServiceRequirement::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function serviceChkFiles()
    {
        return $this->hasMany(ServiceChkFile::class);
    }
}
