<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentable_id', 'comentable_type', 'coment', 'user_id', 'file_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function acPaymentOrder()
    {
        return $this->belongsTo(AcPaymentOrder::class, 'comentable_id')->where('comentable_type', AcPaymentOrder::class);
    }
}
