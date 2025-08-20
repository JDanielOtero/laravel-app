<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcHolding extends Model
{
    use HasFactory;

    protected $fillable = [
        'serie',
        'date',
        'supplier_id',
        'note',
        'impRetenido',
        'impPagado',
        'regimen',
        'tasa',
        'bill_serie',
        'bill_number',
        'bill_date',
        'bill_currency',
        'user_id',
        'ac_payment_order_id',
        'json_holding',
        'sunat_response',
        'sunat_message',
        'bill_fxrate'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function acPaymentOrder()
    {
        return $this->belongsTo(AcPaymentOrder::class);
    }
    public function supplier()
    {
        return $this->belongsTo(LgSupplier::class, 'supplier_id', 'id');
    }
}
