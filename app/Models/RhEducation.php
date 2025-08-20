<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhEducation extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'name', 'rh_worker_id', 'requirement_level', 'education_level', 'institution', 'time', 'file_url','init_date'];

    public function rhWorker()
    {
        return $this->belongsTo(RhWorker::class);
    }
}
