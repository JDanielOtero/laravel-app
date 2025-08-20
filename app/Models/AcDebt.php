<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcDebt extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id',
        'fees',
        'interest',
        'total_amount',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function acPaymentOrders()
    {
        return $this->hasMany(AcPaymentOrder::class);
    }
}
