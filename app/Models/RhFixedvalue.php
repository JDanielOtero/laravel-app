<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhFixedvalue extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'table_type',
        'table_id',
        'concept',
        'currency',
        'pay_frecuency',
        'init_date',
        'end_date',
        'estimate_type',
        'value',
        'file_url',
        'ac_payment_order_id',
        'created_by',
        'rh_contract_id',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function table()
    {
        return $this->morphTo();
    }

    public function acPaymentOrders()
    {
        return $this->hasMany(AcPaymentOrder::class, 'reference_id');
    }
}
