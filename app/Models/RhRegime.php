<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhRegime extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'name',
        'days_work',
        'days_off',
        'hours',
        'rest_value'
    ];

    public function RhWorkers()
    {
        return $this->hasMany(RhWorker::class);
    }
}
