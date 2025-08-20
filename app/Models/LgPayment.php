<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LgPayment extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'lg_requirement_detail_id', 'user_id', 'user_revision_id', 'user_complete_id', 'ac_payment_order_id'];

    public function lgRequirementDetail()
    {
        return $this->belongsTo(LgRequirementDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_revision()
    {
        return $this->belongsTo(User::class, 'user_revision_id');
    }
    public function user_complete()
    {
        return $this->belongsTo(User::class, 'user_complete_id');
    }
    public function acPaymentOrder()
    {
        return $this->belongsTo(AcPaymentOrder::class);
    }
}
