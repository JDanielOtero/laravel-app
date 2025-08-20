<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcPaymentColaborator extends Model
{
    use HasFactory;
    protected $fillable = [
        'ac_payment_order_id','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function acPaymentOrder(){
        return $this->belongsTo(AcPaymentOrder::class);
    }
}
