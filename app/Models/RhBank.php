<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhBank extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'table_type',
        'table_id',
        'pay_method',
        'pay_vaucher_type',
        'pay_frecuency',
        'currency',
        'bank',
        'pay_number',
        'detalle',
        'declaration_file',
        'created_by',
        'updated_by',
        'main_account',
        'titular'
    ];


    public function table()
    {
        return $this->morphTo();
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
