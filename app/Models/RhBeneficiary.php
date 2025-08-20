<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhBeneficiary extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'table_type',
        'table_id',
        'relationship',
        'first_name',
        'middle_name',
        'last_name',
        'document_number',
        'born_date',
        'gender',
        'document_url',
        'bornfile_url',
        'marriage_url',
        'photo_url',
        'contact',
        'work_place',
        'collage'
    ];

    public function table()
    {
        return $this->morphTo();
    }
    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class, 'table_id')->where('table_type', RhWorker::class);
    }
}
