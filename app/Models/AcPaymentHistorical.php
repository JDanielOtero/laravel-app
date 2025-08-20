<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcPaymentHistorical extends Model
{
    use HasFactory;
    protected $fillable = [
        'ac_payment_order_id',
        'amount',
        'user_id',
        'date',
        'bill_type',
        'bill_number',
        'file_url',
        'bill_execution',
        'source_bank_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function acPaymentOrder()
    {
        return $this->belongsTo(AcPaymentOrder::class);
    }
    public function rhBank()
    {
        return $this->belongsTo(RhBank::class, 'source_bank_id');
    }
}
