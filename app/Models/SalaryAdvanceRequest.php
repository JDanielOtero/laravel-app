<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryAdvanceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'advance_amount',
        'discount_amount',
        'date',
        'user_id',
        'quotas',
        'note',
        'file',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
