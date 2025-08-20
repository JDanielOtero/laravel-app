<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhInsurance extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'table_type',
        'table_id',
        'licence_code',
        'licence_type',
        'essalud_date',
        'lifelaw_date',
        'input_date',
        'inscription_date',
        'eps',
        'eps_status',
        'lifelaw_url',
        'essalud_url',
        'informative_url',
        'agreement_url'
    ];


    public function table()
    {
        return $this->morphTo();
    }
}
