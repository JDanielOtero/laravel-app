<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'document_number',
        'name',
        'status',
        'code',
        'alias',
        'created_by',
        'type',
        'sunat_date',
        'activity_date',
        'main_activity',
        'district_id',
        'address',
        'reference',
        'file_number',
        'file',
        'ruc_file'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
