<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RqfItem extends Model
{

    use HasFactory;
    protected $fillable = [
        'rqf_id',
        'status',
        'closed_by',
        'amount',
        'payment_method',
        'payment_file',
        'due_date',
        'cloed_date'
    ];
    public function rqf()
    {
        return $this->belongsTo(Rqf::class);
    }

    public function closedBy()
    {
        return $this->belongsTo(User::class, 'closed_by');
    }
}
