<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhJobprofile extends Model
{
    use HasFactory;
    protected $fillable = ['status','name'];

    public function RhWorkers(){
        return $this->hasMany(RhWorker::class);
    }
}
