<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'fileable_id', 'fileable_type', 'title', 'alt_text', 'file_url', 'category', 'created_by'
    ];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function lgRequirementDetail()
    {
        return $this->belongsTo(LgRequirementDetail::class, 'fileable_id');
    }

    public function qualityFile()
    {
        return $this->belongsTo(QualityFile::class, 'fileable_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
