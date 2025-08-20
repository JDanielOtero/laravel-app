<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpRq extends Model
{
    use HasFactory;
    protected $fillable = ['status','goal', 'requirement','description','job_profile_id'];

    public function jobProfile(){
        return $this->belongsTo(JobProfile::class);
    }
}
